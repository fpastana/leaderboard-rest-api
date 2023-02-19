# About This Project

This project was created to demonstrate how to build an API to add new users as well as addresses. It can also increment and decrement points from a determined user.

It has been using Laravel for the development of this application, so to run the app, just copy and paste the file .env.example in the root path of the project. After that, just rename the file to .env. Finally, execute a few command lines like the examples below: 

## To install the composer packages:
```
composer install
```
## To generate Laravel key
```
php artisan key:generate
```
NOTE: Do not forget to set up the database variables inside your .env file putting the data of your preferred database system
## To install the default users
```
php artisan migrate --seed
```
## In order to run the app
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
    "number":"4000",
    "complement":"Apt 700",
    "postal_code":"L5B3K1",
    "province":"ON",
    "country":"ca"
}
```
* [DELETE] http://localhost/api/users/{id}
* [PATCH] http://localhost/api/users/addPoint/{id}
* [PATCH] http://localhost/api/users/subPoint/{id}


# Final Considerations

I hope you enjoy this small demonstration on how to build a simple API using Laravel

***For tutorials on how to build Open Source Apps, please go to [felipepastana.com](https://felipepastana.com)***
