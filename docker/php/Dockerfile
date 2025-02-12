FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www

COPY . .

CMD ["php-fpm"]
