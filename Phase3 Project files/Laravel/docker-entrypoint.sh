#!/bin/sh
set -e

# Generate an APP_KEY on first boot if one wasn't provided via env vars
if [ -z "$APP_KEY" ]; then
  export APP_KEY=$(php artisan key:generate --show)
fi

mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

php artisan config:clear
php artisan migrate --force

exec "$@"
