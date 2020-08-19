<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thumb extends Model
{
    protected $fillable = [
        'url',
        'uuid',
    ];

    public function getPicAttribute(){
        return url($this->url);
    }
}
