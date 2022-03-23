FROM php:8.1.4-fpm

ARG user
ARG uid

RUN apt update \
    && apt install -y libicu-dev libzip-dev zip git \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

WORKDIR /var/www

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

USER $user