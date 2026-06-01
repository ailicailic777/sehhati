FROM webdevops/php-apache:8.2

ENV WEB_DOCUMENT_ROOT=/app/public
ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

COPY . .

RUN mkdir -p bootstrap/cache storage/framework/cache storage/framework/views storage/framework/sessions storage/logs storage/app database && \
    echo "" > .env && \
    composer update --no-interaction --no-dev --optimize-autoloader --no-scripts && \
    php artisan key:generate --force && \
    php artisan storage:link --force || true && \
    chown -R application:application . && \
    chmod -R 775 bootstrap/cache storage

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80 443

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["supervisord"]
