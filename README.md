# LaravelAPIBoilerplateJWT

An API Boilerplate to create a ready-to-use REST API in seconds with Laravel 8.x

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## Set Environment

```
    $ cp .env.example .env
```

## Set the application key

```
   $ php artisan key:generate
```

## Generate jwt secret key

```
    $ php artisan jwt:secret
```

## Run Migrations
```
    $ php artisan migrate
```

## Run seeder
```
    $ php artisan db:seed
```

## Level of User
```
   When you run seeder, There are three level of user determined by their roles; the admin, photographer and the user(product owner) 
```

## User Registration with Curl

```
    $ curl  -H 'content-type: application/json' -H 'Accept: application/json' -v -X POST -d '{"full_name":"thomas", "username":"thomas123", "email":"admin@laravel.com","password":"secret", "role_id":"1"}' http://127.0.0.1:8000/api/register
```

## User Authentication with Curl

```
    $ curl  -H 'content-type: application/json' -H 'Accept: application/json' -v -X POST -d '{"email":"admin@laravel.com","password":"secret"}' http://127.0.0.1:8000/api/auth/login
```

## Get the logged in user with Curl

```
    $ curl  -H 'content-type: application/json' -H 'Accept: application/json'  -v -X GET http://127.0.0.1:8000/api/auth/me?token=[:token]
```

## User Logout with curl

```
    $ curl  -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/auth/logout?token=[:token]

```

## Refresh token with curl

```
    $ curl  -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/auth/refresh?token=[:token]

```

## User Forgot Password with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v POST -d '{"email": "tony_admin@laravel.com"}' http://127.0.0.1:8000/api/auth/forgot
```

## User Change Password with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v POST -d '{"email": "admin@laravel.com", "password": "secret"}' http://127.0.0.1:8000/api/auth/change?token=[:token]
```

```
    Api collection is attached to the project
```
