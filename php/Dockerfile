# specify image
FROM php:8.2-apache

# install extensions
RUN apt update \
    && apt install -y \
    g++ libicu-dev libpq-dev libzip-dev zip zlib1g-dev nodejs npm\
    && docker-php-ext-install \
    intl opcache pdo pdo_pgsql pgsql

# set the working directory
WORKDIR /var/www/laravel_docker

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite
# finally restart Apache
RUN service apache2 restart
