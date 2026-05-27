FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev libpq-dev nodejs npm \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring zip exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD ["/bin/sh", "-c", "echo 'Starting migration...' && php artisan migrate --force && echo 'Migration done' && php artisan storage:link && echo 'Storage linked' && ls -la public/ && echo 'Starting PHP server on port 10000' && exec php -S 0.0.0.0:10000 -t public && echo 'Server started'"]