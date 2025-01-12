# Requirements

```
Laravel 9 (+PHPUnit)
- PHP 8.1 (+fpm, +sqlite3, +gd, +mbstring, +xml, +zip, +curl, +json)
- Composer
- postgresql
```

# Stage 1 (Booting application)

```
php artisan composer:install
composer run post-root-package-install
php artisan key:generate
php artisan storage:link
```

# Stage 2 (Running migrations and seeders)

#### if it is first booting

```
php artisan migrate --seed
```

#### else

```
php artisan migrate
```

# Stage 4 (Testing application)

```
php artisan test
```

# Stage 4 (Deploying application)

```
Volumes:
    /storage
```

~ using jenkins and docker
