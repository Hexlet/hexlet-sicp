FROM php:8.1-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git \
    libpq-dev \
    libzip-dev \
    racket \
    sqlite3 \
    unzip \
    zip \
    --no-install-recommends \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
    bcmath \
    exif \
    pdo \
    pdo_pgsql \
    pgsql \
    zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -

RUN apt-get install -y nodejs
RUN npm install --location=global npm@latest

# NOTE:fix for EACCES: permission denied
# https://stackoverflow.com/questions/60047304/npm-err-code-elifecycle-npm-err-errno-243
ARG UID=1000
ARG GID=1000
RUN groupadd -g $GID -o sicp
RUN useradd -m -u $UID -g $GID -o -s /bin/bash sicp
USER sicp
