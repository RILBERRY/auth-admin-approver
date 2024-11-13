# Laravel Admin Approver

A Laravel package that implements an admin approval flow for new user registrations.

## Installation

```bash
composer require riley/admin-approver
```

## Configuration

1. Publish the config file:
```bash
php artisan vendor:publish --tag="admin-approver-config"
```

2. Add the trait to your User model:
```php
use Riley\AdminApprover\Traits\RequiresAdminApproval;

class User extends Authenticatable
{
    use RequiresAdminApproval;
}
```

3. Run migrations:
```bash
php artisan migrate
```

## Usage

Add the middleware to your routes:

```php
Route::middleware(['admin.waiting'])->group(function () {
    // Protected routes that require admin approval
});
```

## Configuration Options

```php
return [
    'home' => '/',  // Redirect path after approval
    'waiting_route' => '/waiting-admin-approve', // Waiting page route
    'middleware' => ['web', 'auth'], // Default middleware
    'routes' => [
        'enabled' => true,
        'prefix' => 'admin',
        'middleware' => ['web', 'auth']
    ],
    'views' => [
        'layout' => 'layouts.app' // Your layout file
    ]
];
```
