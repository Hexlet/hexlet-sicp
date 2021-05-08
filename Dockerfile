FROM php:8.0-cli

WORKDIR /app

ENV PHP_IDE_CONFIG="serverName=Docker"

RUN apt-get update && apt-get install -y \
      libzip-dev \
      sqlite3 \
      racket \
      git \
      libpq-dev \
      && docker-php-ext-install zip pdo pdo_pgsql bcmath pgsql exif

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

COPY ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


