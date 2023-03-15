FROM php:8.2.4RC1-apache-bullseye
COPY . . 
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install