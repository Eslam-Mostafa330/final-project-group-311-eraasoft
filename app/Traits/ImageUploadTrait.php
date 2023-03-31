<?php

namespace App\Traits;

trait ImageUploadTrait
{
    protected $image_path = "app/public/images";
    protected $width = 600;
    protected $height = 600;

    public function uploadImage($image)
    {
        $image_name = $this->imageName($image);

        \Image::make($image)->resize($this->width, $this->height)->save(storage_path($this->image_path. '/' . $image_name));

        return "images/" . $image_name;
    }

    public function imageName($image)
    {
        return time().'-'.$image->getClientOriginalName();
    }
}