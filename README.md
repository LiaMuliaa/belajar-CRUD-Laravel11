# belajar-CRUD-Laravel11
This repo for documentation progress my self-learning about basic CRUD Laravel 11

composer create-project laravel/laravel:^11.0 mobil-crud

cd mobil-crud

.env

php artisan storage:link

php artisan config:clear

php artisan migrate

php artisan make:model Mobil -m  (model dan migration)

migration -> model

php artisan migrate

controller (jembatan migration model dengan view)

php artisan make:controller MobilController

Routes -> web.php

Resources -> views -> new folder
