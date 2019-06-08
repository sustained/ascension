web: vendor/bin/heroku-php-nginx -C nginx.conf public/
worker: php artisan queue:restart && php artisan queue:work --tries=3
release: php artisan migrate --force
