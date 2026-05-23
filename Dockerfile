FROM php:8.2-apache

# Install system deps + PHP extensions
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    libzip-dev \
    libicu-dev \
    libcurl4-openssl-dev \
    libpng-dev \
    libxml2-dev \
    unzip \
    git \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_sqlite \
    zip \
    bcmath \
    curl \
    gd \
    intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Create .env, install dependencies, setup app
RUN echo "APP_KEY=" > .env && \
    composer update --no-interaction --no-scripts --optimize-autoloader 2>&1 && \
    php artisan key:generate --force 2>&1 && \
    php artisan storage:link --force 2>&1 || true

RUN cp docker-entrypoint.sh /usr/local/bin/ && \
    chmod +x /usr/local/bin/docker-entrypoint.sh && \
    chown -R www-data:www-data storage bootstrap/cache public

RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
