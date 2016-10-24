# Instructions
Clone the repository
```
git clone https://github.com/Gadurp1/orachat-test.git

```

Cd into the directory
```
cd path/to/project

```
Run composer

```
composer install
```

Now rename the ``.env.example`` file and to ``.env`` set your enviroment variables.

Generate key
```
php artisan key:generate
```

Set up database
```
php artisan migrate
```

Start server
```
php artisan serve
```
