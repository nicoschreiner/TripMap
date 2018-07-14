FROM php:7.2-apache

LABEL maintainer="nico@nicoschreiner.de"

# set working dir
ENV TRIPMAP_PATH /var/www/tripmap
ENV DEPLOY_PATH /tmp/deploy
WORKDIR $TRIPMAP_PATH
ADD ./src $TRIPMAP_PATH
ADD ./.deploy $DEPLOY_PATH

# install packages
RUN apt-get update -y && \
    apt-get install -y --no-install-recommends libcurl4-openssl-dev \
                                               zlib1g-dev \
                                               libjpeg62-turbo-dev \
                                               wget \
                                               libpng-dev \
                                               libicu-dev \
                                               libedit-dev \
                                               libtidy-dev \
                                               libxml2-dev \
                                               libsqlite3-dev \
                                               libpq-dev \
                                               libbz2-dev \
                                               gettext-base \
                                               cron \
                                               locales && \
                                               apt-get clean && \
                                               rm -rf /var/lib/apt/lists/*

# Setup the Composer installer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP exentions.
RUN docker-php-ext-install -j$(nproc) curl gd intl json readline tidy zip bcmath xml mbstring pdo_sqlite pdo_mysql bz2 pdo_pgsql

# Generate locales supported by TripMap
RUN echo "en_US.UTF-8 UTF-8\nde_DE.UTF-8 UTF-8\n\n" > /usr/share/locale/locale.alias && locale-gen

# copy Apache config to correct spot.
#COPY ./.deploy/docker/apache2.conf /etc/apache2/apache2.conf

# Enable apache mod rewrite..
RUN a2enmod rewrite

# Enable apache mod ssl..
#RUN a2enmod ssl

# Create volumes for several directories:
VOLUME $TRIPMAP_PATH/storage/export $TRIPMAP_PATH/storage/upload

# Enable default site (TripMap)
COPY ./.deploy/docker/apache-tripmap.conf /etc/apache2/sites-available/000-default.conf

# Make sure the correct .env-file is used
RUN cp $TRIPMAP_PATH/.env.docker $TRIPMAP_PATH/.env

# Make sure we own TripMap directory
RUN chown -R www-data:www-data $TRIPMAP_PATH && \
    chmod -R 775 $TRIPMAP_PATH/storage

# Make sure we own TripMap Deploy directory
RUN chown -R www-data:www-data $DEPLOY_PATH && \
    chmod -R u+x $DEPLOY_PATH

# Run composer
RUN composer install --prefer-dist --no-dev --no-scripts --no-suggest

# Expose port 80
EXPOSE 80

# Run entrypoint
ENTRYPOINT ["/tmp/deploy/docker/entrypoint.sh"]
