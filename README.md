# PHP Lumen RestFul
It's a simple backend CRUD make with:

[Lumen](https://lumen.laravel.com/) Laravel Website.


## First of all
When you clone this repositorie open the terminal and type
```
composer install
```

## General instructions
In your DB gestor create a new database for this project.
```
create database DBNAME;
```

To use this backend you must to clone this repositorie.

Rename ".env.example" to .env and change some things in archive like you have in your DB 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DBNAME
DB_USERNAME=USERNAME
DB_PASSWORD=USERPSWD
```
To migrate Database
```
php artisan migrate
```

Once you're in your favorite IDE or not, go to the Terminal and go to the project path
and run with this command
```
php -S yourIp:8000 -t ./public
```

To add and use your own user must to do those things:
```
Open postman and type the url http://yourIp:8000/api/signin with POST method
Select x-www-form-urlencoded
Add: 
key: dni value: 12345678X
key: email value: youremail@email.com
key: name value: yourname
key: password value: yourpassword
key: password_confirmation value: yourpassword
```
Then , when you create the user , go to:
```
 http://yourIp:8000/api/login with POST method
Select x-www-form-urlencoded
Add: 
key: email value: youremail@email.com
key: password value: yourpassword
```
And it generate a token.


## Made with
[Php Storm](https://www.jetbrains.com/es-es/phpstorm/) Website.

[Postman](https://www.postman.com/) To check the backend works well.

Readme.md template by [Villanuevand](https://gist.github.com/Villanuevand/6386899f70346d4580c723232524d35a)

---
💻 with 💜 by [TeteV](https://github.com/TeteV) 🐦

