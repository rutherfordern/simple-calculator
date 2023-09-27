FROM php:8.2-fpm-alpine

RUN apk add --no-cache curl libpq-dev libzip-dev unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
COPY . /var/www