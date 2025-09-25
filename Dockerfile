FROM php:7.3-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql calendar

# Habilitar mod_rewrite para que funcione .htaccess
RUN a2enmod rewrite

# Configurar Apache para permitir .htaccess
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf

# Copiar todo el proyecto al contenedor
COPY . /var/www/html/


# --- ¡ESTA ES LA LÍNEA MÁS IMPORTANTE! ---
# Copia el script de inicialización de la base de datos.
# El contenedor de MySQL lo ejecutará automáticamente al iniciar.
COPY ./init.sql /docker-entrypoint-initdb.d/

# Configurar permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

WORKDIR /var/www/html
