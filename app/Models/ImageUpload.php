<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $fillable = [
        'url',
        'uuid',
        'model_id',
        'ext',
        'original_name',
        'name',
        'size',
        'width',
        'time',
        'valid',
    ];

    public function getSizedAttribute(){
        if(!empty($this->size )){
            return intval($this->size /100000);
        }
        return 0;
    }

    public function thumbnail(){
        return $this->hasOne(Thumb::class, 'uuid', 'uuid');
    }

    public function getImageAttribute(){
        return url($this->url);
    }

    public function getThumbAttribute(){
        return url($this->thumbnail->url);
    }

}
