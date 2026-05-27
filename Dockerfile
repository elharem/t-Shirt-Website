FROM php:8.2-cli

# Extensions PHP nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /var/www

# Copier tout le projet
COPY . .

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Installer dépendances JS et compiler les assets
RUN npm install && npm run build

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Caches Laravel
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Port
EXPOSE 10000

# Lancement — migrations incluses au démarrage
CMD php artisan migrate --force --seed && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=10000