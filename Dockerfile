FROM composer:2

WORKDIR /app

COPY .jane-openapi .jane-openapi

RUN composer require "jane-php/open-api-2:7.4.0"

WORKDIR /app/out

ENTRYPOINT ["php", "../vendor/bin/jane-openapi"]