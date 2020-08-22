<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WsfOutline extends Model
{
    //
    protected $fillable = [
        'uuid',
        'file_id',
        'name',
        'active',
        'current',
        'dfh',
    ];

    public function file(){
        return $this->belongsTo(ImageUpload::class, 'file_id', 'uuid');
    }
}
