FROM webdevops/php-apache:8.2

ENV WEB_DOCUMENT_ROOT=/app/public
ENV COMPOSER_MEMORY_LIMIT=-1

WORKDIR /app

COPY . .

RUN echo "" > .env && \
    composer update --no-interaction --no-dev --optimize-autoloader --no-scripts && \
    php artisan key:generate --force && \
    php artisan storage:link --force || true && \
    chown -R application:application storage bootstrap/cache public

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80 443

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["supervisord"]
