# ChatBot

A simple AI-powered chat application with a FastAPI backend and a static JavaScript/HTML frontend, containerized with Docker.

## Features

- FastAPI backend serving AI-generated responses  
- Static frontend built with vanilla JS, HTML & Tailwind CSS  
- Docker Compose for easy multi‑container orchestration  

## Prerequisites

- Docker & Docker Compose installed  
- A `.env` file in the project root with the following variables:
  ```env
  GOOGLE_API_KEY=your_google_api_key
  NEO4J_URL=bolt://your_neo4j_host:7687
  NEO4J_USERNAME=your_neo4j_user
  NEO4J_PASSWORD=your_neo4j_password
  ```
  
## Project Structure

```
ChatBot/
├── Backend/                ← FastAPI service
│   ├── app.py
│   ├── Dockerfile
│   └── requirements.txt
│   └── models/
│       └── resquest.py
│       └── response.py
│   └── resources/
│       └── db_structure.json
├── Frontend/               ← Static UI files
│   ├── index.html
│   ├── Dockerfile
│   └── resources/
│       └── js/chat.js
├── docker-compose.yml
├── .env.example
└── .gitignore
```

## Getting Started

1. Rename `.env.example` to `.env` and fill in your secrets.  
2. From project root run:
   ```bash
   docker-compose up --build
   ```
3. Open your browser:
   - Frontend: http://localhost:3000  
   - Backend API (for testing): http://localhost:8000/  

## Stopping & Cleanup

```bash
# Stop containers
docker-compose stop

# Stop & remove containers, networks, volumes
docker-compose down --volumes
```
