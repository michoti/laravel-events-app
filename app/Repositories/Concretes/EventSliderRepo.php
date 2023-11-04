<?php

namespace App\Repositories\Concretes;

use App\Models\EventSliderImage;
use App\Repositories\Contracts\EventSliderRepoInterface;

use Illuminate\Support\Facades\Cache;


class EventSliderRepo implements EventSliderRepoInterface
{
    public function getTotalSliders()
    {
        return EventSliderImage::count();
    }

    public function getSlidersInDescendingOrder()
    {
        return EventSliderImage::orderBy('id', 'desc')->get();
    }

    public function getEventImageSliders(int $amount)
    {
        $result = Cache::remember('slider_images_cache', 1440, function (){
            return EventSliderImage::select('slider_imagename')->get();
        });
        
        return $result;
    }
}