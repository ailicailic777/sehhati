FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
        libsqlite3-dev \
        unzip \
        curl \
    && docker-php-ext-install pdo pdo_sqlite curl bcmath \
    && a2enmod rewrite \
    && sed -i 's|/var/www/html|/app/public|g' /etc/apache2/sites-available/000-default.conf \
    && printf '\n<Directory /app/public>\n    AllowOverride All\n</Directory>\n' >> /etc/apache2/apache2.conf \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

RUN mkdir -p bootstrap/cache storage/framework/cache storage/framework/views storage/framework/sessions storage/logs storage/app database && \
    printf "APP_NAME=Sehhati\nAPP_ENV=production\nAPP_DEBUG=false\nDB_CONNECTION=sqlite\nDB_DATABASE=/app/database/database.sqlite\n" > .env && \
    chmod -R 775 bootstrap/cache storage

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer update --no-interaction --no-dev --optimize-autoloader && \
    php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link --force || true && \
    chown -R www-data:www-data .

COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]

EXPOSE 80
