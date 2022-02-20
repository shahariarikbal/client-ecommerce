<?php  
namespace App\ImageUpload;

use Intervention\Image\Facades\Image;

trait ImageTrait{

    public function image100()
    {
        // echo $this->imageName;
        // dd($this->imageName);
        $location =  $this->path .'/100/' . $this->imageName;

        $img = Image::make( $this->image );

        $img->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save( $location, $this->quality );
    }

    public function image200()
    {
        // echo $this->imageName;
        // dd($this->imageName);
        $location =  $this->path .'/200/' . $this->imageName;

        $img = Image::make( $this->image );

        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save( $location, $this->quality );
    }

    public function image400()
    {
        // echo $this->imageName;
        // dd($this->imageName);
        $location =  $this->path .'/400/' . $this->imageName;

        $img = Image::make( $this->image );

        $img->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save( $location, $this->quality );
    }

    public function image600()
    {
        // echo $this->imageName;
        // dd($this->imageName);
        $location =  $this->path .'/600/' . $this->imageName;

        $img = Image::make( $this->image );

        $img->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save( $location, $this->quality );
    }
}









