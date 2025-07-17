# Syntech Globalscopes

A Laravel package for adding global model scopes and attributes without modifying individual models.

## Installation

You can install the package via Composer:

```bash
composer require syntech/globalscopes
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="Syntech\GlobalScopes\GlobalScopesServiceProvider"
```

This will create a globalscopes.php configuration file in the config directory of your Laravel application.

## Example Configuration

```php
return [

       /*
    |--------------------------------------------------------------------------
    | Global Query Methods
    |--------------------------------------------------------------------------
    |
    | Define any global query methods that should be available across all
    | Eloquent models. These methods can be used to add commonly used query
    | functionality to all models.
    |
    | Example:
    | 'active' => function () {
    |    return $this->where('status', 1);
    | },
    |
    */

    'methods' => [
        'active' => function () {
            return $this->where('status', 1);
        },
        'someMore' => function () {
                    // add more ...
            }
    ],

];
```

## Usage

Adding Global Scopes

Once configured, the global scopes will automatically be applied to all Eloquent models.
Adding Global Attributes

Global attributes can be accessed as if they are defined directly on the model:

$customers = Customer::active()->get();

return $customers; // Uses the global attribute logic
