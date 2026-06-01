FROM webdevops/php-apache:8.2

ENV WEB_DOCUMENT_ROOT=/app/public
ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

COPY . .

RUN printf "APP_NAME=Sehhati\nAPP_ENV=production\nAPP_DEBUG=false\nDB_CONNECTION=sqlite\nDB_DATABASE=/app/database/database.sqlite\n" > .env && \
    mkdir -p bootstrap/cache storage/framework/cache storage/framework/views storage/framework/sessions storage/logs storage/app database && \
    composer update --no-interaction --no-dev --optimize-autoloader && \
    php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link --force || true && \
    chown -R application:application . && \
    chmod -R 775 bootstrap/cache storage

EXPOSE 80 443
