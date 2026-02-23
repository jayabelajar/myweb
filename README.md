# MyWeb (Laravel 12)

## Quick Start (setelah clone)

```bash
cd myweb
composer install
npm install
cp .env.example .env
php artisan key:generate
```

## Set `.env` (MySQL)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myweb
DB_USERNAME=root
DB_PASSWORD=
```

## Jalankan

```bash
php artisan migrate --seed
php artisan storage:link
composer run dev
```

Buka: `http://127.0.0.1:8000`

## Login Admin

- URL: `http://127.0.0.1:8000/admin/login`
- Email: `admin@veritasdev.com`
- Password: `admin123`
