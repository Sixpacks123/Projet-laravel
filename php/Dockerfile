# Use the php:8.2-apache image as a base
FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/laravel_docker

# Install necessary packages and PHP extensions
RUN apt update && apt install -y \
        g++ libicu-dev libpq-dev libzip-dev zip zlib1g-dev nodejs npm \
    && docker-php-ext-install intl opcache pdo pdo_pgsql pgsql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && a2enmod rewrite \
    && apt clean && rm -rf /var/lib/apt/lists/* 

# Copy application files into the container
COPY src/ /var/www/laravel_docker/

# Install composer and npm dependencies
RUN composer install --no-scripts --no-autoloader --no-dev --prefer-dist && composer clear-cache
RUN npm install