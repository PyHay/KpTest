FROM php:8.3-alpine

RUN chmod -R 755 /var/www/html
RUN mkdir /.symfony5
RUN chmod -R 777 /.symfony5
WORKDIR /var/www/html

RUN apk --update --no-cache add \
  git \
  bash \
  libintl \
  icu-dev \
  icu-data-full \
  zlib-dev \
  libpng-dev \
  sqlite-dev \
  libzip-dev \
  libxml2-dev \
  libxslt-dev \
  libgomp \
  linux-headers\
  imagemagick imagemagick-dev \
  oniguruma-dev \
  openssh-client \
  postgresql-dev \
  rsync

RUN curl -o /usr/local/bin/composer https://getcomposer.org/download/latest-stable/composer.phar \
  && chmod +x /usr/local/bin/composer

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash \
    && apk add symfony-cli

RUN docker-php-ext-configure intl \
  && docker-php-ext-install -j "$(nproc)" \
  pdo \
  pdo_pgsql \
  gd \
  opcache \
  intl \
  zip \
  calendar \
  dom \
  mbstring \
  zip \
  gd \
  xsl \
  soap \
  sockets \
  exif \
  bcmath

#CMD ["symfony", "serve" , "--port=8000", "--no-tls"]