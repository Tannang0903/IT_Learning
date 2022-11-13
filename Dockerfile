FROM php:7.4.33-apache
WORKDIR /var/www/html/
COPY . .
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
EXPOSE 80