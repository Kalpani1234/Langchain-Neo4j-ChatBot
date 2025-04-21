FROM php:8.0-apache

WORKDIR /var/www/html

# Copy all frontend files
COPY . /var/www/html/

# Enable Apache rewrite module
RUN a2enmod rewrite

# Configure PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Expose port 80
EXPOSE 80

# Apache starts automatically in this image
CMD ["apache2-foreground"]