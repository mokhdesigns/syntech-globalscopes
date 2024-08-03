<?php

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
    | 'approved' => function ($query) {
    |     return $query->where('status', 1)->where('approved', 1);
    | },
    |
    */

    'methods' => [],

    /*
    |--------------------------------------------------------------------------
    | Global Attributes
    |--------------------------------------------------------------------------
    |
    | Define any global attributes that should be available across all
    | Eloquent models. These attributes can be used to add common logic for
    | accessing or modifying attribute values.
    |
    | Example:
    | 'image' => function ($value) {
    |     return $value ? $value : asset('images/default.png');
    | },
    |
    */

    'attributes' => [],

    /*
    |--------------------------------------------------------------------------
    | Global Scopes
    |--------------------------------------------------------------------------
    |
    | Define any global scopes that should be applied to all Eloquent models.
    | Scopes are used to add common query constraints to all models.
    |
    | Example:
    | 'approved' => 'status = 1 AND approved = 1',
    |
    */

    'scopes' => [],
];
