# ascension

A Memrise clone for learning purposes/portfolio filler.

# Install

**NOTE:** You'll need to setup Redis and Postgres by yourself, for now at least. :P

```
git clone https://github.com/sustained/ascension.git
cd ascension
composer install
npm install
cp .env.example .env
php artisan horizon:install
php artisan queue:failed-table
php artisan telescope:install
php artisan migrate
php artisan db:seed
php artisan key:generate
```

# Run

```
npm run dev
npm run api
npm run redis
```
