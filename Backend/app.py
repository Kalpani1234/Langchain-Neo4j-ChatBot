from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from models.request import QueryRequest
from models.response import QueryResponse
import os
import json
from langchain_google_genai import ChatGoogleGenerativeAI
from langchain_neo4j import Neo4jGraph
import re

# Initialize the LLM
llm = ChatGoogleGenerativeAI(model="gemini-1.5-pro")

# Initialize the Neo4j graph connection
graph = Neo4jGraph(
    url=os.environ.get("NEO4J_URL"),
    username=os.environ.get("NEO4J_USERNAME"),
    password=os.environ.get("NEO4J_PASSWORD"),
)

# Load database schema for prompt
db_schema_path = os.path.join(os.path.dirname(__file__), "resources", "db_structure.json")
with open(db_schema_path, "r") as f:
    db_schema = json.load(f)

app = FastAPI(title="LLM Query API")

app.add_middleware(
  CORSMiddleware,
  allow_origins=["*"],
  allow_credentials=True,
  allow_methods=["*"],
  allow_headers=["*"],
)

@app.post("/query", response_model=QueryResponse)
async def query_llm(request: QueryRequest):
    # 1) Ask LLM for Cypher
    prompt1 = (
        f"Database schema:\n{json.dumps(db_schema)}\n\n"
        f"User question: \"{request.query}\"\n"
        "Generate a Cypher query to retrieve exactly what the user asked for."
    )
    cypher_resp = llm.invoke(prompt1)

    # strip code‑fences if the model wrapped its response in ``` or ```cypher
    raw = cypher_resp.content.strip()
    if raw.startswith("```"):
        # remove opening fence (with optional language) and closing fence
        raw = re.sub(r"^```[^\n]*\n", "", raw)
        raw = re.sub(r"\n```$", "", raw)
    cypher_query = raw.strip()

    # 2) Execute it
    try:
        raw_results = graph.query(cypher_query)
    except Exception as e:
        raise HTTPException(status_code=400, detail=f"Cypher execution error: {e}")

    # 3) Ask LLM for a friendly answer
    prompt2 = (
        f"The user asked: \"{request.query}\".\n"
        f"I ran this Cypher: {cypher_query}\n"
        f"And got these results: {raw_results}\n"
        "Please provide a concise, user‑friendly answer."
    )
    friendly = llm.invoke(prompt2)

    return QueryResponse(query=request.query, response=friendly.content)

# Optional health check endpoint
@app.get("/")
async def root():
    return {"status": "API is running"}

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8000)