
# Laravel Blog

Saya mencoba untuk menantang diri sendiri untuk menyelesaikan Laravel Roadmap Beginner Level (level pemula) yang telah disediakan oleh [Laravel Daily](https://github.com/LaravelDaily/Laravel-Roadmap-Learning-Path) yaitu membuat blog sederhana menggunakan teknologi Laravel.


## Tech

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)

## Installation

1. Clone repository

```bash
git clone https://github.com/melanchorilla-portfolio/laravel-blog
cd laravel-blog
composer install
npm install
copy .env.example .env
```

2. Konfigurasi database melalui `.env`

```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. Migrasi dan symlinks

```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

4. Jalankan website

```bash
npm run dev
# Run in different terminal
php artisan serve
    
