#!/bin/bash

# 1. Instalar dependencias de PHP
composer install

# 2. Instalar Drupal
# Cambiamos 'standard' por '--existing-config' para que no ignore tus YAML de config/sync
# Usamos las credenciales de tu .env (drupal_user/drupal_password)
vendor/bin/drush si minimal -y \
  --db-url=mysql://drupal_user:drupal_password@db/drupal_db \
  --account-name=admin \
  --account-pass=admin \
  --existing-config

# 3. Importar configuración (por si acaso hubo cambios extra)
vendor/bin/drush cim -y

# 4. Limpiar caché para registrar hooks y servicios
vendor/bin/drush cr

echo "🚀 ¡LMS Instalado con éxito! Accede en http://localhost:8080"
echo "📧 Mailpit disponible en http://localhost:8025"