FROM php:7.3.1
ENV LANG=C.UTF-8
ENV LANGUAGE=C.UTF-8
ENV LC_ALL=C.UTF-8
RUN set -ex; \
    \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; \
    \
    curl -sL https://deb.nodesource.com/setup_10.x | bash -; \
    \
    apt-get update -y; \
    apt-get install -y \
      openssl \
      zip \
      unzip \
      git \
      build-essential \
      nodejs \
      espeak \
      python3-pip \
    ; \
    \
    pip3 install \
      joblib \
      segments \
    ; \
    \
    docker-php-ext-install \
      pdo \
      mbstring \
      mysqli \
      pdo_mysql \
    ;
WORKDIR /app
ADD .env.example .env
COPY . /app
COPY wait-for-it.sh /wait-for-it.sh
RUN set -ex; \
    \
    composer install; \
    \
    npm install; \
    \
    chmod +x /wait-for-it.sh;
EXPOSE 8181