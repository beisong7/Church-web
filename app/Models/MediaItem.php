<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    protected $fillable = [
        'uuid',
        'media_id',
        'file_id',
        'author_id',
        'download_count',
        'view_count',
    ];

    public function file(){
        return $this->hasOne(ImageUpload::class, 'uuid', 'file_id');
    }
}
