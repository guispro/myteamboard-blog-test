<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Technologies

- Php 8
- Docker
- Laravel 8.x
- Mariadb
- Docker compose 

## Intructions

This project was created with Laravel and including Sail to create the environment. 

First you must to beign the containers
 
```bash
 <root-project-path>$ ./vendor/bin/sail up -d
 ```


 After that you must tu connect into laravel container and execute the following command:

 ```bash
<root-project-path>$ composer install
<root-project-path>$ php artisan migrate
<root-project-path>$ npm install
<root-project-path>$ npm run dev

 ```
