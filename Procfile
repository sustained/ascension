web: vendor/bin/heroku-php-nginx -C nginx.conf public/
worker: php artisan horizon:terminate && php artisan horizon
release: php artisan migrate --force
