FROM php:8.2-cli

# Installe les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie le projet Symfony dans le container
WORKDIR /var/www/symfony
COPY ./symfony /var/www/symfony

# Par défaut, lance le serveur web intégré
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
