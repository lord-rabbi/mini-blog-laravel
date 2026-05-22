# Dockerfile
FROM php:8.3-apache

# Installation des extensions PHP et des outils
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip \
    && a2enmod rewrite \
    && apt-get clean

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier tout le projet
COPY . .

# Installer les dépendances PHP (avec ignore-platform-reqs pour éviter les erreurs de version PHP)
RUN composer install --no-interaction --optimize-autoloader --no-scripts --ignore-platform-reqs

# Configurer .env
RUN cp .env.example .env

# Générer la clé Laravel
RUN php artisan key:generate

# Donner les permissions
RUN chmod -R 777 storage bootstrap/cache

# Configurer Apache pour le dossier public
RUN sed -i 's/\/var\/www\/html/\/var\/www\/html\/public/g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
