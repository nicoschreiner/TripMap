#!/bin/bash

# remove any files that may break upgrades:
rm -f $TRIPMAP_PATH/storage/logs/laravel.log

cat .env.docker | envsubst > .env && cat .env
composer dump-autoload
php artisan package:discover
exec apache2-foreground
