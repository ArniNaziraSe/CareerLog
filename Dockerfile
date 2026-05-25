FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql zip

RUN a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN rm -rf public/build
RUN rm -f public/hot
RUN rm -rf bootstrap/cache/*.php
RUN rm -rf storage/framework/views/*
RUN rm -rf storage/framework/cache/data/*

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN test -f public/build/manifest.json

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD php artisan migrate --force && apache2-foreground