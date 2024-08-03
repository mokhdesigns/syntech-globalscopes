<?php

namespace Syntech\GlobalScopes;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class GlobalScopesServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->publishes([
            __DIR__.'/config/globalscopes.php' => config_path('globalscopes.php'),
        ]);

        $this->registerGlobalScopes();

        $this->registerGlobalAttributes();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/globalscopes.php', 'globalscopes'
        );
    }

    protected function registerGlobalScopes()
    {
        $scopes = Config::get('globalscopes.scopes', []);
        $methods = Config::get('globalscopes.methods', []);

        // Apply global scopes to all models
        Model::addGlobalScope('globalScopes', function (Builder $builder) use ($scopes) {
            foreach ($scopes as $name => $scope) {
                $builder->whereRaw($scope);
            }
        });

        // Register methods as Builder macros

        foreach ($methods as $name => $method) {

            Builder::macro($name, $method);
        }
    }


    protected function registerGlobalAttributes()
    {
        $attributes = Config::get('globalscopes.attributes', []);

        Model::booted(function ($model) use ($attributes) {
            foreach ($attributes as $name => $callback) {
                $model->addDynamicAttribute($name, $callback);
            }
        });
    }

}
