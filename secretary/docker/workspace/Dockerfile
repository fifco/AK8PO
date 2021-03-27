FROM php:7.4-cli-alpine

# Add a non-root user to prevent files being created with root permissions on host machine.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN apk add --no-cache \
        bash \
        curl \
        git \
        zip \
        shadow && \
    apk add --no-cache --virtual .build_deps $PHPIZE_DEPS && \
    apk add --no-cache --virtual .run-deps shadow icu-libs icu-dev && \
    pecl channel-update pecl.php.net && \
    groupadd -g ${PGID} user && \
    useradd -u ${PUID} -g user -m user && \
    usermod -p "*" user

# MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# bcmath
RUN docker-php-ext-install bcmath

# intl
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl

# cleanup
RUN apk del .build_deps

# composer
COPY --from=composer:2.0.9 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
