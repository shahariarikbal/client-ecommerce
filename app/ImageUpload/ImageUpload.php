<?php
namespace App\ImageUpload;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use Image;
// use File;
// use Str;

class ImageUpload
{
    use ImageTrait, ImageDeleteTrait;

    protected $image;
    protected $imageName;
    protected $path;
    protected $location;
    protected $quality = 80;

    /**
     * upload function
     *
     * @param object $image
     * @param string $name
     * @param string $location
     * @param boolean $is_orignal
     * @param array $functions
     * @return string
     */

    public function upload($image, $name, $location, $is_orignal, $functions)
    {
        $this->image = $image;
        $this->imageName = Str::slug($name) . time() . '.' . $this->image->getClientOriginalExtension();
        $this->path = $location;
        $this->location =  $this->path .'/' . $this->imageName;

        // uploading original image   
        if ($is_orignal == true) {   
            $img = Image::make( $this->image )->save( $this->location, $this->quality );
        }  

        $this->executeBulkFunction($functions, 'image');
        return $this->imageName;
    }

    /**
     * remove function
     *
     * @param string $imageName
     * @param string $location
     * @param array $functions
     * @return 
     */
    public function delete($imageName, $location, $functions = [])
    {
        $this->imageName = $imageName;
        $this->path = $location;
        // remove from original location 
        if (File::exists($this->path . '/' . $this->imageName)) {
            File::delete($this->path . '/' . $this->imageName);
        }

        // delete from subfolders
        $this->executeBulkFunction($functions, 'delete');
    }

    private function executeBulkFunction($functions, $prefix)
    {
        if(count($functions) > 0) {
            foreach($functions as $function) {
                $function = ucwords($function);
                // dd($prefix.str_replace(' ','',$function));
                $this->{$prefix.str_replace(' ','',$function)}();
            }
        }
    }


}
