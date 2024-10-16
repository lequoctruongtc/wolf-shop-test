<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

User docker and docker-compose to start application [docker](https://www.docker.com/get-started)

## Usage

```shell
chmod +x ./start.sh
./start.sh
```

## Update .env file

DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DB_DATABASE=wolf-shop

DB_USERNAME=user

DB_PASSWORD=password

Remember update `CLOUDINARY_URL`

## Run test

```shell
docker-compose exec php sh
php artisan test or vendor/bin/phpunit
```

## Postman collection

Import file at "postman/wolf-shop.postman_collection.json"

## Console command to import Item

```shell
docker-compose exec php sh
php artisan item:import
```

## API endpoint to upload `imgUrl`

POST: /api/item/{id}/upload

## Account testing

email: test@example.com

password: 123456
