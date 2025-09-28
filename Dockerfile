FROM php:8.0-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql calendar

# Habilitar mod_rewrite y configurar Apache
RUN a2enmod rewrite \
    && echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copiar todo el proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/Assets/images/uploads

WORKDIR /var/www/html
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]