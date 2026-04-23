#!/bin/bash

echo "=== Copy .env ==="
cp -v /opt/laravel_setup/.env_local /application/.env

echo "=== Switching shell to /application folder ==="
cd /application

echo "=== Run composer install ==="
composer install

echo "=== Run npm install ==="
npm install

echo "=== Run npm run build ==="
npm run build

echo "=== Run php artisan key:generate ==="
php artisan key:generate

echo "=== Run php artisan storage:link ==="
php artisan storage:link

echo "=== Run php artisan migrate ==="
php artisan migrate

echo "=== Run install mc ==="
apt install mc

echo "=== Run /usr/sbin/php-fpm8.4 -O ==="
/usr/sbin/php-fpm8.4 -O