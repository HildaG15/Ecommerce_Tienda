# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Habilita la extensión pdo_mysql necesaria para la conexión a la base de datos
RUN docker-php-ext-install pdo pdo_mysql calendar

# Habilita el módulo de reescritura de Apache para las URL amigables
RUN a2enmod rewrite

# Permite que los archivos .htaccess funcionen
RUN echo '<Directory /var/www/html/>\n    AllowOverride All\n</Directory>' >> /etc/apache2/apache2.conf

# Copia todos los archivos de tu proyecto al contenedor
COPY . /var/www/html/

# Copia el script de inicialización de la base de datos
# Este script se ejecutará automáticamente cuando el contenedor de la base de datos se inicie
COPY ./init.sql /docker-entrypoint-initdb.d/

# Establece los permisos correctos para que Apache pueda leer y escribir los archivos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# El comando por defecto para iniciar Apache, ya está en la imagen base
CMD ["apache2-foreground"]