# Utilise l'image de base officielle PHP avec FPM
FROM php:8.3-fpm-alpine
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Installer les dépendances nécessaires

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



