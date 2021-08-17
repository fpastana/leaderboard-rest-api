# About This Project

I created this project to demonstrate how to build an API that we can add new users + addresses using Test Driven Development. For this API you can also add and subtract points from a determined user.  

It was used Laravel for the development of this application, so to run the app, just copy and paste the file .env.example in the root path of the project. After that, just rename the file into .env. Finally, execute a few command lines, like the samples below: 

## In order to install vendor folder
```
composer update
```
## In order to generate Laravel key
```
php artisan key:generate
```
NOTE: Do not forget to configure the database variables inside your .env file putting the data of your preferred database system
## In order to run the TDD
```
php artisan test
```
## In order to install the default users
```
php artisan migrate:refresh --seed
```
## in order to run the app
```
php artisan serve
```

# Endpoints documentation

* [GET] http://localhost/api/users
* [POST] http://localhost/api/users
```JSON
{
    "name":"Felipe Pastana Api test",
    "email":"felipe@fhwebsystems.com",
    "age":33,
    "points":0
}
```
* [POST] http://localhost/api/users/{user_id}/addresses
```JSON
{
    "streetname":"Parkside Village Dr",
    "number":"4085",
    "complement":"Apto 705",
    "postal_code":"L5B0K9",
    "province":"ON",
    "country":"ca"
}
```
* [DELETE] http://localhost/api/users/{id}
* [PATCH] http://localhost/api/users/addPoint/{id}
* [PATCH] http://localhost/api/users/subPoint/{id}


# Final Considerations

I hope you enjoy this small demonstration of how to build a simple API using Laravel
