FROM php:7.4-fpm-alpine

ARG XDEBUG_INI_FILENAME

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS && \
    apk add --no-cache --virtual .run-deps shadow icu-libs icu-dev zlib-dev libzip-dev && \
    pecl chanel-update pecl.php.net

# xDebug
#RUN pecl install xdebug-2.7.0beta1 \
#    && docker-php-ext-enable xdebug
#COPY ${XDEBUG_INI_FILENAME} /usr/local/etc/php/conf.d/xdebug.ini

# zip
RUN docker-php-ext-install zip

# MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# bcmath
RUN docker-php-ext-install bcmath

# intl
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl

# opcache
RUN docker-php-ext-install opcache
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

COPY ./backend.ini /usr/local/etc/php/conf.d
COPY ./xbackend.pool.conf /usr/local/etc/php-fpm.d/

RUN apk del .build-deps

USER root

RUN usermod -u 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
