#!/usr/bin/env bash

if [ -f .env ]; then
    export $(grep -v '^#' .env | xargs)
fi

# 1. Instalar dependencias de PHP
echo "Instalando dependencias con Composer..."
composer install

# 2. Leventar Docker
echo "🐳 Levantando Contenedores..."
docker compose up -d --build

# 3. Esperar a que la DB responda (Evita errores de conexión)
echo "⏳ Esperando a que la base de datos esté lista..."
sleep 10

# 4. Lógica de Instalación vs Importación
echo "Importando configuración de Drupal..."

# Verificamos si Drupal ya está instalado preguntando por el estado del sistema
if ! docker compose exec -T app vendor/bin/drush status --format=list | grep -q "Connected"; then
    echo "🆕 Base de datos vacía detectada. Instalando Drupal..."
    
    # Usamos las variables de tu .env para la URL de la DB
    docker compose exec -T app vendor/bin/drush site:install minimal \
      --db-url=mysql://${MYSQL_USER}:${MYSQL_PASSWORD}@db:3306/${MYSQL_DATABASE} \
      --site-name="Simple LMS" \
      --account-name=admin \
      --account-pass=admin -y
    
    # Sincronizar el UUID del sitio con la configuración de GitHub
    echo "🆔 Sincronizando UUID del sitio para permitir Config Import..."
    # Extraemos el UUID del archivo YAML exportado
    CONFIG_UUID=$(grep uuid website/config/sync/system.site.yml | awk '{print $2}')
    docker compose exec -T app vendor/bin/drush config-set system.site uuid "$CONFIG_UUID" -y
fi

# 5. Importar la configuración del repositorio
echo "🔄 Sincronizando configuración (Config Sync)..."
docker compose exec -T app vendor/bin/drush cim -y

# 6. Limpieza final
echo "🧹 Limpiando caché..."
docker compose exec -T app vendor/bin/drush cr

echo "-------------------------------------------------------"
echo "🚀 ¡LMS Instalado con éxito! Accede en http://localhost:8080"
echo "👤 Usuario: admin | Pass: admin"
echo "📧 Mailpit disponible en http://localhost:8025"
echo "-------------------------------------------------------"