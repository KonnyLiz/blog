<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Usamos metodos de shema para darle valores por default a las 
// migraciones de la BD
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // aqui es donde les decimos que hacer a las migraciones

        //la BD tendra por defecto 100 caracteres de largo
        Schema::defaultStringLength(100);
    }
}
