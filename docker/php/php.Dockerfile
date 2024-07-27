FROM php:8.3-fpm

ENV APP_HOME /var/www/html

ENV USERNAME=www-data

ADD ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN chown -R ${USERNAME}:${USERNAME} $APP_HOME

COPY --chown=${USERNAME}:${USERNAME} ./src/back/ $APP_HOME/

WORKDIR $APP_HOME/back