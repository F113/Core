FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
        curl \
        git \
        openssl \
        libssl-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) iconv mbstring zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install opcache \
    && docker-php-ext-install sockets \
    && docker-php-ext-install bcmath

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql pgsql

ADD docker/php/output.conf /usr/local/etc/php/conf.d/output.conf
ADD docker/php/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

COPY . /app
WORKDIR /app

CMD ["php-fpm"]