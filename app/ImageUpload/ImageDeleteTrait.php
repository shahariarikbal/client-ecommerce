<?php  
namespace App\ImageUpload;

use File;

trait ImageDeleteTrait{

	public function delete100()
    {
        if (File::exists($this->path . '/100/' . $this->imageName)) {
            File::delete($this->path . '/100/' . $this->imageName);
        }
    }

    public function delete200()
    {
        if (File::exists($this->path . '/200/' . $this->imageName)) {
            File::delete($this->path . '/200/' . $this->imageName);
        }
    }

	public function delete400()
    {
        if (File::exists($this->path . '/400/' . $this->imageName)) {
            File::delete($this->path . '/400/' . $this->imageName);
        }
    }

    public function delete600()
    {
        if (File::exists($this->path . '/600/' . $this->imageName)) {
            File::delete($this->path . '/600/' . $this->imageName);
        }
    }
}




