# PHP Lumen RestFul
It's a simple backend CRUD make with:

[Lumen](https://lumen.laravel.com/) Laravel Website.


## First of all
To better use of this , you can Donwload my frontend Proyect

[Frontend](https://github.com/TeteV/AuthKotlin)

When you clone this repositorie open the terminal and type
```
composer install
```

## General instructions
This proyect can run with my Frontend here:\
[Frontend](https://github.com/TeteV/AuthKotlin)\

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
##To migrate Database
```
php artisan migrate
```

Once you're in your favorite IDE or not, go to the Terminal and go to the project path
and run with this command
```
php -S yourIp:8000 -t ./public
```

##To add a user
You need a user to do some things like the crud
```
Open postman and type the url http://yourIp:8000/api/signin with POST method
Select form-data
Add: 
key: dni value: 12345678X
key: email value: youremail@email.com
key: name value: yourname
key: password value: yourpassword
and if you want
key: url_image (type file) value: select file
```
Then , when you create the user , go to:
```
http://yourIp:8000/api/login with POST method
Select x-www-form-urlencoded
Add: 
key: email value: youremail@email.com
key: password value: yourpassword
```
And it generate a token, save it.

##To add a room
With the saved token you must to
```
Open postman and type the url http://yourIp:8000/add-room with POST method
Select form-data
key: num value: 345 (for example)
key: num_ppl value: 3
key: size value: 24
key: avaible value: 0
key: api_token value: yourSavedToken
and if you want
key: url_image (type file) value: select file
```




## Made with
[Php Storm](https://www.jetbrains.com/es-es/phpstorm/) Website.

[Postman](https://www.postman.com/) To check the backend works well.

Readme.md template by [Villanuevand](https://gist.github.com/Villanuevand/6386899f70346d4580c723232524d35a)

---
💻 with 💜 by [TeteV](https://github.com/TeteV) 🐦

