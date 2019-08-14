# ascension

A Memrise clone for learning purposes/portfolio filler.

# Install

## Manual Redis/Postgres Installation

For now you'll need to setup Redis and Postgres by yourself. I personally am using
a dockerised stack for local development which takes the pain away for _me_ but I
fully appreciate that setting up Postgres is not particularly fun.

I definitely plan to make this easier in the future.

## Instructions

```
git clone https://github.com/sustained/ascension.git
cd ascension
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
php artisan horizon:install
php artisan telescope:install
php artisan migrate
php artisan db:seed
```

# Running

```
npm run webpack
npm run laravel
npm run redis
npm run queue
```
