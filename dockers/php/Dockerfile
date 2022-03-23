FROM php:7.4-fpm

WORKDIR /var/www

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    yarn \
    nodejs \
    zlib1g-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    libxml2-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    && pecl install xdebug-2.9.0 mongodb \
    && dockers-php-ext-enable xdebug mongodb \
    && dockers-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && dockers-php-ext-configure zip \
    && dockers-php-ext-install -j$(nproc) gd soap iconv pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD ./php.ini /usr/local/etc/php/php.ini

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

EXPOSE 9000
CMD ["php-fpm"]
