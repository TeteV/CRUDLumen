# PHP Lumen RestFul
It's a simple backend CRUD make with:

[Lumen](https://lumen.laravel.com/) Laravel Website.

##General instructions
In your DB gestor create a new database for this project.
```
create database DBNAME;
```

To use this backend you must to clone this repositorie.

And change some things in .env archive like you have in your DB 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DBNAME
DB_USERNAME=USERNAME
DB_PASSWORD=USERPSWD
```
To migrate Database
Once you're in your favorite IDE or not, go to the Terminal and go to the project path
and run with this command
```
php -S localhost:8000 -t ./public
```

Open Postman and type this url to use it
```
GET all: http://localhost:8000/directorios
GET One by 'nombre_completo' or 'telefono': http://localhost:8000/directorios?txtBuscar=XXXX
```

## Made with
[Php Storm](https://www.jetbrains.com/es-es/phpstorm/) Website.

[Postman](https://www.postman.com/) To check the backend works well.

Readme.md template by [Villanuevand](https://gist.github.com/Villanuevand/6386899f70346d4580c723232524d35a)

Github Icons by [rxaviers](https://gist.github.com/rxaviers/7360908)

---
💻 with 💜 by [TeteV](https://github.com/TeteV) 🐦

