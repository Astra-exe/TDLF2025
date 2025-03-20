FROM python:3.12-slim

WORKDIR /app

# Instalar dependencias del sistema para compilar pandas
RUN apt-get update && apt-get install -y \
    gcc \
    g++ \
    libxml2-dev \
    libxslt-dev \
    && rm -rf /var/lib/apt/lists/*

# Copiar requirements.txt primero para cachear las dependencias
COPY da/requirements.txt .

# Instalar dependencias de Python
RUN pip install --upgrade pip && \
    pip install -r requirements.txt

# Copiar el resto del código
COPY da /app

# Puerto expuesto (Koyeb usa $PORT automáticamente)
ENV PORT=80
EXPOSE 80

# Comando de inicio
CMD ["gunicorn", "--bind", "0.0.0.0:80", "app:app"]