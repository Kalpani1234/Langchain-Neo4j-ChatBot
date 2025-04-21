FROM python:3.9-slim

WORKDIR /app

# Copy requirements first for better caching
COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt

# Copy backend files
COPY . ./

# Expose API port
EXPOSE 8000

# Start the backend server
CMD ["python", "app.py"]