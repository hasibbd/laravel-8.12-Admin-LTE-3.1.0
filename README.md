


# Boiler Template

Laravel 8.12,
Admin LTE 3.1.0,
Yajra DataTable


### Installing

A step by step series of examples that tell you how to get a development env running


```
# 1 . Clone the repository into your htdocs/www folder
# 2. Composer
composer install

# 3. Copy ENV file
cp .env.example .env

# 4. APP Key
php artisan key:generate

# 5. Edit ENV
Set database info

# 5. Migrate
php artisan migrate

# 5. Seed
php artisan db:seed --class=AdminUserSeeder 

