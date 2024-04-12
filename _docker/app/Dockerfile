FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
      libzip-dev \
      zip \
      unzip \
      make \
      git \
      default-mysql-client

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install zip

WORKDIR /var/www
ADD . /var/www
RUN chmod -R 777 db
RUN chown -R www-data:www-data /var/www

COPY _docker/app/php.ini /etc/php/8.3/cli/php.ini

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www
