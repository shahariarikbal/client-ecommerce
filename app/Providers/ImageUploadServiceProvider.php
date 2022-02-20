<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\ImageUpload\ImageUpload;

class ImageUploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ImageUpload', function(){
            return new ImageUpload();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
