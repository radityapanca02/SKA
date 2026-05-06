FROM php:8.4-fpm-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    icu-dev \
    oniguruma-dev \
    linux-headers

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl

# GET Latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy file project
COPY . .

# Install deps
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Set permissions untuk storage & cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
