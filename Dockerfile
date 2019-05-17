FROM php:7.3.1
# Set language for phonemizer
ENV LANG=C.UTF-8
ENV LANGUAGE=C.UTF-8
ENV LC_ALL=C.UTF-8
# Install dependencies
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
    # Create requirements.txt
    pip3 install -r phonemizer/requirements.txt \
    ; \
    \
    docker-php-ext-install \
      pdo \
      mbstring \
      mysqli \
      pdo_mysql \
    ; \
    \
    composer global require \
    friendsofphp/php-cs-fixer \
    ;
ENV PATH="root/.composer/vendor/bin:${PATH}"
# Set Workdir
WORKDIR /app
# Install dependencies before copying project
ADD ./composer.json ./composer.lock ./
RUN set -eux; \
    \
    composer install --prefer-dist --no-autoloader --no-scripts --no-progress --no-suggest --no-interaction; \
    composer clear-cache
ADD ./package.json ./package-lock.json ./
RUN set -eux; \
    \
    npm install; \
    npm cache verify
# Add the .env file
ADD .env.example .env
COPY . /app
COPY wait-for-it.sh /wait-for-it.sh
# Install PHP dependencies
RUN set -ex; \
    \
    composer install --prefer-dist --no-progress --no-suggest --no-interaction; \
    composer clear-cache; \
    \
    chmod +x /wait-for-it.sh;
EXPOSE 8181