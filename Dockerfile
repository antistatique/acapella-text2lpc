FROM php:7.3.1
ENV LANG=C.UTF-8
ENV LANGUAGE=C.UTF-8
ENV LC_ALL=C.UTF-8
RUN if ! hash composer 2>/dev/null; then curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; fi
RUN if ! hash nodejs 2>/dev/null; then curl -sL https://deb.nodesource.com/setup_10.x | bash -; fi
RUN apt-get update -y && apt-get install -y openssl zip unzip git build-essential nodejs espeak python3-pip
RUN docker-php-ext-install pdo mbstring mysqli pdo_mysql
RUN pip3 install joblib && pip3 install segments
WORKDIR /app
COPY . /app
RUN composer install
RUN npm install
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181