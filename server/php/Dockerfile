FROM php:7.3-fpm

MAINTAINER CKALL

ARG timezone

ENV TIMEZONE=${timezone:-"Asia/Shanghai"} \
    PHPREDIS_VERSION=5.1.0 \
    SWOOLE_VERSION=4.4.18 \
    COMPOSER_ALLOW_SUPERUSER=1

# Libs -y --no-install-recommends
RUN apt-get update \
    && apt-get install -y \
        curl wget git zip unzip less vim procps lsof tcpdump htop openssl net-tools iputils-ping \
        libzip-dev \
        libssl-dev \
        libnghttp2-dev \
        libpcre3-dev \
        libjpeg-dev \
        libpng-dev \
# Install PHP extensions
    && docker-php-ext-install \
       bcmath gd pdo_mysql mbstring sockets zip sysvmsg sysvsem sysvshm \
# Clean apt cache
    && rm -rf /var/lib/apt/lists/*

# Install    composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update --clean-backups \
# Install redis extension
    && wget http://pecl.php.net/get/redis-${PHPREDIS_VERSION}.tgz -O /tmp/redis.tar.tgz \
    && pecl install /tmp/redis.tar.tgz \
    && rm -rf /tmp/redis.tar.tgz \
    && docker-php-ext-enable redis \
# Install swoole extension
    && wget https://github.com/swoole/swoole-src/archive/v${SWOOLE_VERSION}.tar.gz -O swoole.tar.gz \
    && mkdir -p swoole \
    && tar -xf swoole.tar.gz -C swoole --strip-components=1 \
    && rm swoole.tar.gz \
    && ( \
        cd swoole \
        && phpize \
        && ./configure --enable-mysqlnd --enable-sockets --enable-openssl --enable-http2 \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r swoole \
    && docker-php-ext-enable swoole \
#librdkafka
    && wget https://github.com/edenhill/librdkafka/archive/v1.4.2.tar.gz -O librdkafka.tar.gz \
    && mkdir -p librdkafka \
    && tar -xf librdkafka.tar.gz -C librdkafka --strip-components=1 \
    && rm librdkafka.tar.gz \
    && ( \
            cd librdkafka \
            && ./configure \
            && make -j$(nproc) \
            && make install \
        ) \
#rdkafka
    && wget https://github.com/arnaud-lb/php-rdkafka/archive/4.0.3.tar.gz -O rdkafka.tar.gz \
    && mkdir -p rdkafka \
    && tar -xf rdkafka.tar.gz -C rdkafka --strip-components=1 \
    && rm rdkafka.tar.gz \
    && ( \
            cd rdkafka \
            && phpize \
            && ./configure \
            && make -j$(nproc) \
            && make install \
        ) \
#安装mongodb
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
# Clear dev deps
    && apt-get clean \
    && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
#安装nsq
    && https://github.com/yunnian/php-nsq.git
    && cd php-nsq \
    && phpize \
    && ./configure \
    && make  \
    && make install \
# Timezone
    && cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone \
    && echo "[Date]\ndate.timezone=${TIMEZONE}" > /usr/local/etc/php/conf.d/timezone.ini

WORKDIR /www
EXPOSE 9000 9501