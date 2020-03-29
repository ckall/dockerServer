FROM registry.cn-shenzhen.aliyuncs.com/lnmpdev/php:7.3-fpm-alpine
ADD ./ext/phpredis-4.1.1.tar.gz /usr/src/php/ext/
ADD ./swoole-lib/swoole-4.2.1.tgz  /tmp/
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk update \
    && apk upgrade \
    && apk add --no-cache m4 autoconf make gcc g++ linux-headers wget \
    && cd /tmp/swoole-4.2.1 && phpize && ./configure && make && make install \
    && docker-php-ext-enable swoole \
    &&  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && chmod 777 /usr/bin/composer \
    && composer self-update \
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
    && mv /usr/src/php/ext/phpredis-4.1.1 /usr/src/php/ext/redis/ \
    && apk add --no-cache unzip \
    && apk add --no-cache curl \
    && apk add git \
    && apk add --no-cache freetype \
    && apk add --no-cache libjpeg-turbo \
    && apk add --no-cache freetype-dev \
    && apk add --no-cache libjpeg-turbo-dev \
    && apk add --no-cache libmcrypt-dev \
    && apk add --no-cache libpng-dev \
    && apk add --no-cache openssl-dev \
    && apk add --no-cache libxml2-dev \
    && apk add --no-cache libcurl \
    && apk add --no-cache bzip2-dev \
    && apk add --no-cache libzip-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-zlib-dir=/usr \
    && docker-php-ext-install zip \
    && docker-php-ext-install bz2 \
    && docker-php-ext-install gd \
    && docker-php-ext-install dba \
    && docker-php-ext-install soap \
    && docker-php-ext-install redis \
    && docker-php-ext-install pdo_mysql bcmath \
    && pecl install mongodb-1.6.0 \
    && docker-php-ext-enable mongodb \
    && rm -rf /usr/src/php \
    && rm -rf /tmp/*

WORKDIR /app
