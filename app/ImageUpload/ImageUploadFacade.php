<?php
namespace App\ImageUpload;


use Illuminate\Support\Facades\Facade;

class ImageUploadFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ImageUpload';
    }
}