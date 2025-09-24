FROM php:8.1-apache   

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql calendar

# Habilitar mod_rewrite para que funcione .htaccess
RUN a2enmod rewrite

# Configurar Apache para permitir .htaccess
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf

WORKDIR /var/www/html
