<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'uuid',
        'author_id',
        'title',
        'banner',
        'slug',
        'info',
        'active',
    ];

    public function author(){
        return $this->hasOne(User::class, 'uuid', 'author_id');
    }

    public function items(){
        return $this->hasMany(MediaItem::class, 'media_id', 'uuid');
    }

    public function getImageAttribute(){
        if(file_exists($this->banner)){
            return url($this->banner);
        }else{
            return url('images/placeholder.jpg');
        }
    }
}
