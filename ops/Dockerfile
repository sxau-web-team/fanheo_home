FROM dockerproxy.com/library/php:7.4-fpm
# COPY . /var/www/html
# WORKDIR /var/www/html
RUN apt-get update && apt-get install -y libzip-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli
EXPOSE 9000
CMD ["php-fpm"]

# FROM php:7.4-fpm
# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# RUN docker-php-ext-install mysqli pdo_mysql
