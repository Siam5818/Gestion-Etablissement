FROM php:8.3-fpm

# Définir le répertoire de travail
WORKDIR /var/www

# Copier le code de l'application
COPY . .

# Installer les dépendances système et les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    curl \
    libnghttp2-14 \
    && docker-php-ext-install pdo pdo_pgsql

# Vérifier l'installation des bibliothèques
RUN ldconfig

# Installer Composer globalement
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

# Vérifier l'installation de Composer
RUN php /usr/local/bin/composer --version

# Installer les dépendances PHP avec Composer
RUN php /usr/local/bin/composer install --no-interaction --optimize-autoloader

# Exposer le port 8002 pour le serveur web
EXPOSE 8002

# Définir la commande de démarrage
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8002"]
