#!/bin/bash

FILE_ENV=./src/.env
if test ! -f "$FILE_ENV"
then
    echo "cp ./src/.env.example ./src/.env"
    cp ./src/.env.example ./src/.env
fi

# Run build and start service
docker-compose build && docker-compose up -d

# Install packages
echo "docker-compose exec php sh -c \"composer install && php artisan migrate && php artisan db:seed && exit\""
docker-compose exec php sh -c "composer install && exit"

# Set permission
chmod 777 -R ./src/storage
chmod 777 -R ./src/bootstrap/cache

# Migrate and seed
docker-compose exec php sh -c "php artisan migrate && php artisan db:seed && exit"
