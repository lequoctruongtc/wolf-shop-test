FROM php:8.3-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd intl mysqli pdo_mysql xsl zip exif

# Install composer
RUN cd /var/tmp/ && curl -s http://getcomposer.org/installer | php && mv ./composer.phar /usr/local/bin/composer
