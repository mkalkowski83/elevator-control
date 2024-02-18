FROM php:8.2-cli as cli

RUN apt-get update && apt-get install -y git unzip curl bash mc

RUN docker-php-ext-install bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version


ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_ALLOW_SUPERUSER=1

FROM cli
COPY . /app/
WORKDIR /app/

RUN composer install