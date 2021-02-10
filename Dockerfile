FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
      libzip-dev \
      sqlite3 \
      git \
      libpq-dev \
      && docker-php-ext-install zip pdo pdo_pgsql bcmath pgsql exif

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl https://cli-assets.heroku.com/install.sh | sh

WORKDIR /app
