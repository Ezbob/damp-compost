FROM php:7.4.16-fpm-buster

RUN docker-php-ext-install pdo pdo_mysql
