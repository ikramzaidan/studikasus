# Instalasi
## Prasyarat
1. PHP 8.1
2. XAMPP (MySQL)
3. Node.js LTS (https://nodejs.org/en/download)

## Menjalankan aplikasi secara lokal

1. Clone or download this repository.
2. Install or update composer.
```
composer update
```
3. Copy `.env.example` file and rename to `.env`.
```
cp .env.example .env
```
4. Generate laravel app key.
```
php artisan key:generate
```
5. Migrate *database*.
```
php artisan migrate
```
6. Seed *database*
```
php artisan db:seed --class=RolePermissionSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=FeatureSeeder
```
7. Install *node* package.
```
npm install
```
8. Run *node package manager* for production.
```
npm run build
```
9. Serve the app.
```
php artisan serve
```

# License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
