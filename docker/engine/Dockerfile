FROM php:5.6-fpm
MAINTAINER Paul des Garets <paul.des-garets@student.ecp.fr>

RUN apt-get update \
    && apt-get install -y \
        libicu-dev \
        zlib1g-dev \
    && curl -L -o /tmp/xdebug-2.3.3.tgz http://xdebug.org/files/xdebug-2.3.3.tgz \
    && tar xfz /tmp/xdebug-2.3.3.tgz \
    && rm -r /tmp/xdebug-2.3.3.tgz \
    && mv xdebug-2.3.3 /usr/src/php/ext/xdebug \
    && docker-php-ext-install \
        intl \
        mbstring \
        xdebug \
        zip \
        pdo \
        pdo_mysql \
    && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

ENV UNSECURE on
