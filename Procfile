web: vendor/bin/heroku-php-nginx -C nginx.conf public/
release: php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force
