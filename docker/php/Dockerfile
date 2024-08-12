FROM php:8.2-fpm

RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    libpng-dev \
    libwebp-dev \
    libfreetype6-dev libjpeg62-turbo-dev\
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install exif \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install required tools for nodejs
RUN apt-get update && apt-get install -y \
    gnupg \
    curl

# add nodejs
RUN curl -s https://deb.nodesource.com/gpgkey/nodesource.gpg.key | gpg --dearmor | tee /usr/share/keyrings/nodesource.gpg >/dev/null \
    && echo 'deb [signed-by=/usr/share/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x focal main' > /etc/apt/sources.list.d/nodesource.list \
    && echo 'deb-src [signed-by=/usr/share/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x focal main' >> /etc/apt/sources.list.d/nodesource.list \
    && chmod a+r /usr/share/keyrings/nodesource.gpg \
    && apt-get update \
    && apt-get install -y nodejs
# add nodejs

WORKDIR /var/www/project
RUN chown -R 33:33 /var/www/project

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer