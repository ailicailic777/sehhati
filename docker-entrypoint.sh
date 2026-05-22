#!/bin/bash
set -e

# Ensure storage + cache directories exist
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/bootstrap/cache

# Ensure database directory exists
mkdir -p /var/www/html/database

# Run migrations + seeders (creates SQLite db + tables + default data)
php artisan migrate --seed --force

# Start Apache
exec "$@"
