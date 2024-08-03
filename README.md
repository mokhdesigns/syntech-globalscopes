# Syntech Globalscopes

A Laravel package for adding global model scopes and attributes without modifying individual models.

## Installation

You can install the package via Composer:

```bash
composer require syntech/globalscopes



## Configuration

Publish the configuration file:


```bash
php artisan vendor:publish --provider="Syntech\GlobalScopes\GlobalScopesServiceProvider"



This will create a globalscopes.php configuration file in the config directory of your Laravel application.


## Example Configuration

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Global Query Methods
    |--------------------------------------------------------------------------
    |
    | Define global query methods for all Eloquent models.
    |
    */

    'methods' => [
        'approved' => function ($query) {
            return $query->where('status', 1)->where('approved', 1);
        },
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Attributes
    |--------------------------------------------------------------------------
    |
    | Define global attributes for all Eloquent models.
    |
    */

    'attributes' => [
        'image' => function ($value) {
            return $value ? $value : asset('images/default.png');
        },
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Scopes
    |--------------------------------------------------------------------------
    |
    | Define global scopes to be applied to all Eloquent models.
    |
    */

    'scopes' => [
        'approved' => 'status = 1 AND approved = 1',
    ],
];

 
## Usage

Adding Global Scopes

Once configured, the global scopes will automatically be applied to all Eloquent models.
Adding Global Attributes

Global attributes can be accessed as if they are defined directly on the model:


$customer = App\Models\Customer::find(1);
echo $customer->image; // Uses the global attribute logic
