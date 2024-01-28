# Use the official PHP base image
FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy Composer files
COPY composer.json composer.lock /var/www/html/

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-scripts --no-autoloader

# Copy the rest of the application files
COPY . /var/www/html/

# Generate the Composer autoloader
RUN composer dump-autoload --optimize

# Expose port 9000 (used by PHP-FPM)
EXPOSE 9000
