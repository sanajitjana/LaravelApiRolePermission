# Laravel API Role Permission

This project is a Laravel 8-based RESTful API boilerplate featuring user authentication and robust role/permission management using the [spatie/laravel-permission](https://github.com/spatie/laravel-permission) package and [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum) for API token authentication.

---

## Features

- **User Authentication:** Register and login endpoints with API token support (Laravel Sanctum).
- **Role & Permission Management:** Assign roles and permissions to users, and protect routes based on user abilities (Spatie Laravel Permission).
- **Modern Laravel 8 Structure:** Uses Laravel's expressive routing, Eloquent ORM, migrations, and service providers.
- **Ready for Extension:** Easily add new resources, policies, or extend permission logic.

---

## Getting Started

### Prerequisites

- PHP 7.3 or higher
- Composer
- MySQL or compatible database
- Node.js & NPM/Yarn (for frontend/build tools, if you plan to use them)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/sanajitjana/LaravelApiRolePermission.git
   cd LaravelApiRolePermission
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Copy and configure your environment:**
   ```bash
   cp .env.example .env
   # Edit .env to match your DB and app settings
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

6. **(Optional) Seed roles/permissions/users:**
   ```bash
   php artisan db:seed
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   ```

---

## API Endpoints

| Method | Endpoint        | Description              | Auth Required |
| ------ | -------------- | ------------------------ | -------------|
| POST   | /api/register  | User registration        | No           |
| POST   | /api/login     | User login (get token)   | No           |
| GET    | /api/user      | Get current user profile | Yes (token)  |

> **Note:** All protected routes use `auth:sanctum` middleware. Extend routes/api.php for your own resources.

---

## Role & Permission Management

This API uses [spatie/laravel-permission](https://github.com/spatie/laravel-permission) to manage roles and permissions. Assign roles and permissions via seeder, artisan commands, or by extending controllers as needed.

Example of protecting a route:

```php
Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-only', function () {
    // Only accessible by users with the "admin" role
});
```

---

## Tech Stack

- Laravel 8.x
- Laravel Sanctum (API authentication)
- Spatie Laravel Permission (roles/permissions)
- PHP 7.3+
- Composer

---

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Credits

Created by [sanajitjana](https://github.com/sanajitjana).
Based on the Laravel framework and Spatie's permission package.
