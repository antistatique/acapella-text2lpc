<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManagerStatic;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('imageable', function ($attribute, $value, $params, $validator) {
            try {
                ImageManagerStatic::make($value);

                return true;
            } catch (\Exception $e) {
                return false;
            }
        });
        Validator::extend('temp_imageable', function ($attribute, $value, $params, $validator) {
            try {
                ImageManagerStatic::make(storage_path('app/temp_images/').$value);

                return true;
            } catch (\Exception $e) {
                return false;
            }
        })
    }
}
