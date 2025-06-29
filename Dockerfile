# Usa una imagen base de PHP
FROM php:8.2-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto al directorio de trabajo
COPY . .

# Copiar archivo .env si es necesario
COPY .env .env

# Habilita el módulo mod_rewrite
RUN a2enmod rewrite

# Establece los permisos de archivos y directorios
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instala las dependencias de Composer
RUN apt-get update && apt-get install -y \
    unzip \
    && docker-php-ext-install pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Instalar dependencias del proyecto
RUN composer install --no-interaction

# Expone el puerto que será utilizado
EXPOSE 80

# Comando para iniciar el servidor
CMD ["apache2-foreground"]
