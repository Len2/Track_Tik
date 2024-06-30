<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## How to install 

# Laravel Docker Project

This project sets up a Laravel application with Docker using Docker Compose.

## Prerequisites

- Docker
- Docker Compose

## Getting Started

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Len2/Track_Tik.git
   cd Track_Tik
2. **Config env:**

   ```bash
   create .env file and copy/paste all things from .env.example

3. **Build and start the Docker containers:**

   ```bash
   docker-compose up -d --build

4. **Install Composer dependencies:**

   ```bash
   docker-compose exec app composer install

5. **Generate application key:**

   ```bash
   docker-compose exec app php artisan key:generate

6. **Run database migrations:**

   ```bash
   docker-compose exec app php artisan migrate

7. **Run seeders:**

   ```bash
   docker-compose exec app php artisan db:seed

8. **Run test (optional):**

   ```bash
   docker-compose exec app php artisan test

9. **Access your application:**
    [http://localhost:8000](http://localhost:8000)
   I hope you like it ❤️ 😀
   [Lendrit Shala](https://www.linkedin.com/in/lendrit-shala-541994123/)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
