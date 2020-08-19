<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = [
        'uuid',
        'image_id',
        'main_text',
        'mini_text',
        'button',
        'button_text',
        'button_link',
        'active',
        'except',
        'start',
        'end',
    ];

    public function image(){
        return $this->hasOne(ImageUpload::class, 'uuid', 'image_id');
    }
}
