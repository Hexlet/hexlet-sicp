FROM php:7.4-fpm

RUN apt-get update && \
    apt-get install -y \
    nodejs \
    npm \
    git \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql bcmath zip exif

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /srv/www/app

RUN usermod -u 1000 www-data
