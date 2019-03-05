<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Setup Instructions

Run the commands below

- clone the repo by running `git clone https://github.com/pktharindu/laracom.git`;
- run `cp .env.example .env` to copy the .env file;
- run `composer install` to install the composer dependencies;
- run `npm install` to install the npm dependencies;
- run `php artisan key:generate` to add the encription key;
- run `php artisan storage:link` to create a link between public and storage;
- edit the env file and add the database credentials;
- run `php artisan migrate:fresh --seed` to migrate the tables and seed the database;
- set the APP_URL in .env file as well as resources\js\frontend\config.js file;
- run `npm run dev` to compile assets;