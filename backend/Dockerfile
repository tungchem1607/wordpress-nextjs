# Docker compose by dev@nguyenanhung.com

# Use PHP 7.2-fpm
FROM php:8.2-fpm

# Copy composer.lock and composer.json
# COPY composer.lock composer.json /var/www/
COPY composer.json /var/www

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpq-dev \
    g++ \
    libicu-dev \
    libxml2-dev \
    libzip-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    autoconf \
    pkg-config \
    libssl-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mysqli pdo_mysql mbstring zip exif pcntl bcmath soap
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install GD
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install mcrypt
RUN apt-get update && apt-get install -y \
    libmcrypt-dev
RUN pecl install mcrypt && docker-php-ext-enable mcrypt

# Install apcu
RUN pecl install apcu && docker-php-ext-enable apcu

# Install Imagemagick & PHP Imagick ext
RUN apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends

RUN pecl install imagick && docker-php-ext-enable imagick

# Install mongodb ext
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install xdebug
RUN pecl install xdebug-3.1.5 && docker-php-ext-enable xdebug

# remove not necessary files
RUN rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -gid 1000 www-data
RUN useradd -uid 1000 -ms /bin/bash -g www-data www-data

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY chown -R www-data:www-data ./var/www

# Change current user to www
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
