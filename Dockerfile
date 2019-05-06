FROM php:7.3.1
RUN if ! hash composer 2>/dev/null; then curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; fi
RUN if ! hash nodejs 2>/dev/null; then curl -sL https://deb.nodesource.com/setup_10.x | bash -; fi
RUN apt-get update -y && apt-get install -y openssl zip unzip git build-essential nodejs espeak
RUN docker-php-ext-install pdo mbstring mysqli pdo_mysql
WORKDIR /app
COPY . /app
RUN composer install
RUN npm install