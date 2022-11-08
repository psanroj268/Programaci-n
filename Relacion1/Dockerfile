# Dockerfile para Apache

FROM php:8.1-apache-buster

EXPOSE 80

RUN docker-php-ext-install mysqli

RUN docker-php-ext-enable mysqli

RUN a2enmod rewrite

RUN apachectl restart