<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSliderImage extends Model
{
    use HasFactory;

    protected $path = 'images/frontend_images/events/';

    protected $fillable = ['slider_imagename'];

    public function getSliderImagenameAttribute($image)
    {
        return $this->path . $image;
    }
}
