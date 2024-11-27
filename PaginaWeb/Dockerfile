FROM php:7.4-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar archivos de la aplicación
COPY app/ /var/www/html/

# Dar permisos necesarios
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/
