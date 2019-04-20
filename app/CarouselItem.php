<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    protected $table = "carousel";

    protected $fillable = [
        'image_url', 'caption', 'caption_url'
    ];
}
