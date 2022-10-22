FROM php:8.1 as php

RUN apt-get update -y
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

WORKDIR /var/www
COPY . .

COPY --from=composer:2.4.0 /usr/bin/composer /usr/bin.composer


ENTRYPOINT [ "docker/entrypoint.sh"]
