# Usa una imagen base de PHP
FROM php:8.3-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Habilita el módulo mod_rewrite
RUN a2enmod rewrite

# Instala extensiones necesarias y Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libmariadb-dev-compat \
    libmariadb-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    && docker-php-ext-install pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug  

# Copia los archivos del proyecto al directorio de trabajo
COPY . .

COPY php.ini /usr/local/etc/php/php.ini
# Establece los permisos de archivos y directorios
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto que será utilizado
EXPOSE 80

# Comando para iniciar el servidor
CMD ["apache2-foreground"]
