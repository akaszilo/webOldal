FROM php:8.1-fpm-alpine3.19  

# Install dependencies
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    mariadb-client-dev \
    mysql-dev \  # Add this line
    libzip-dev \
    libpng-dev \
    icu-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl \
    && docker-php-ext-enable pdo_mysql mbstring zip exif pcntl \
    && apk del .build-deps

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/html/

RUN composer install --no-dev --optimize-autoloader

# Copy existing application source code
COPY . /var/www/html

# Set document root
WORKDIR /var/www/html
