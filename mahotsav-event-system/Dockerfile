FROM php:8.2-apache

# Install mysqli + pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache mod_rewrite (optional but recommended)
RUN a2enmod rewrite

# Copy project files
COPY public/ /var/www/html/
COPY config/ /var/www/config/
COPY src/ /var/www/src/


EXPOSE 80
