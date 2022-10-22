#!/bin/bash

php artisan migrate
php artisan key:generate
php artisan cache:clear

php artisan serve
