FROM php:8.0.2-apache

RUN apt-get update

# 1. development packages
RUN apt-get install -y curl sudo nano git zip unzip

RUN curl -sL https://deb.nodesource.com/setup_16.x | sudo -E bash - &&\
    apt-get -y install nodejs &&\
    ln -s /usr/bin/nodejs /usr/local/bin/node

# 2. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=2.2.6

ARG uid

RUN useradd -G www-data,root -u $uid -d /home/app app-user

RUN mkdir -p /home/app/.composer && \
    chown -R app-user:app-user /home/app