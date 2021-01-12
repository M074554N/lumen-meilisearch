# dockerfile
FROM php:8.0-fpm

# Copy composer.lock and composer.json
COPY app/composer.lock* app/composer.json* /var/www/html/

# Set working directory
WORKDIR /var/www/html

RUN  apt-get update -y && \
     apt-get upgrade -y && \
     apt-get dist-upgrade -y && \
     apt-get -y autoremove && \
     apt-get clean

RUN apt-get install -y zip \
    unzip

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install sockets
RUN docker-php-ext-enable sockets

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY ./app /var/www/html

CMD ["composer","install"]

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
