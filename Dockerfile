FROM php:8.4-fpm-alpine

# Install system dependencies, PHP extensions, dan NODEJS + NPM
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    icu-dev \
    oniguruma-dev \
    linux-headers \
    nodejs \
    npm

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

# Install PHP Dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Install NPM Dependencies & Build Assets (CSS/JS)
RUN npm install
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
