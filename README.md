# exchange-app

To get the application running, clone the repository first.
After that from the root directory of the repository run:
```
composer install
```

After doing that, get your .env file set. Run from the terminal the following command:
```
mv .env.example .env
```
To set you app key, run:
```
php artisan key:generate
```

Run your XAMPP (or anything else that you use for a db host) and create database called `exchanger`.
In your .env file adapt the following lines:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exchanger
DB_USERNAME={your db username}
DB_PASSWORD={your db password}
```

After setting up your database, apply the migrations so you get all the neccessary tables in your database by running:
```
php artisan migrate
```
Followed by
```
php artisan db:seed
```

Before launching the app, in order to test mail sending change your env file and put your own `https://mailtrap.io/`  parameters.
Finally, to start your local server run:
```
php artisan serve
```

The application is set up. The currency rates will be update once you click on either `Click to exchange` or if you try to configure a currency.
