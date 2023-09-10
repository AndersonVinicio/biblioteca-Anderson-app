<?php

namespace App\Providers;

use App\Models\librosModel;
use App\Models\pretamosModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(librosModel::class, function($app){
            return new librosModel();
        });

        $this->app->bind(pretamosModel::class,function($app){
            return new pretamosModel();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
