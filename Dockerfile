# Base image with PHP
FROM php:8.3-cli

# Set the working directory
WORKDIR /app

# Install required dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    curl && \
    docker-php-ext-install zip pdo_pgsql

# Install Symfony CLI manually
RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Add Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Allow running Composer as superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy application files to the container
COPY . .

# Install PHP dependencies using Composer
RUN composer install --prefer-dist --optimize-autoloader

# Expose a port (adjust based on your app needs, e.g., 8000)
EXPOSE 80

# Run Symfony server as default command (or use another command if needed)
CMD ["symfony", "serve", "--no-tls"]
