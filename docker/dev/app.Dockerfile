FROM php:7.3-fpm

RUN apt-get -qq update && apt-get -qq install -y \
    libmcrypt-dev \
    libpq-dev \
    git \
    vim \
    zip \
    openssl \
    zlib1g-dev \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev  \
 && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y wget git unzip \
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    mbstring \
    tokenizer \
    bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

RUN pear install PHP_CodeSniffer

RUN /usr/local/bin/phpcs --config-set show_progress 1 && \
    /usr/local/bin/phpcs --config-set colors 1 && \
    /usr/local/bin/phpcs --config-set report_width 140 && \
    /usr/local/bin/phpcs --config-set encoding utf-8 && \
    /usr/local/bin/phpcs --config-set severity 1

WORKDIR /var/www

COPY docker/dev/config/php.ini /usr/local/etc/php/php.ini

RUN adduser --disabled-password --gecos "" docker-user && \
  echo "docker-user ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

# Clean
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/cache/*

USER docker-user
