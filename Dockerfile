FROM php:7.3-apache
MAINTAINER Devin Matte <matted@csh.rit.edu>

ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

RUN a2enmod rewrite && a2enmod headers && a2enmod expires && \
    sed -i '/Listen/{s/\([0-9]\+\)/8080/; :a;n; ba}' /etc/apache2/ports.conf && \
    chmod og+rwx /var/lock/apache2 && chmod -R og+rwx /var/run/apache2

RUN apt-get -yq update && \
    apt-get -yq install gnupg imagemagick libmagickwand-dev --no-install-recommends && \
    apt-get -yq clean all

RUN docker-php-ext-install mysqli && \
    pecl install imagick && docker-php-ext-enable imagick

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
    && apt-get -yq update \
    && apt-get -yq install nodejs \
    && npm install \
    && npm run-script build \
    && rm -rf node_modules \
    && apt-get -yq remove nodejs \
    && apt-get -yq clean all

RUN composer install

EXPOSE 8080
EXPOSE 8443
