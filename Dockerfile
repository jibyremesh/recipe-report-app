FROM php:7.4-apache


# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite

# pdo_mysql package
RUN docker-php-ext-install pdo_mysql