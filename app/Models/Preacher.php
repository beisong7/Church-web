<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preacher extends Model
{
    protected $fillable = [
        'uuid',
        'author_id',
        'title',
        'first_name',
        'last_name',
        'image',
        'active',
    ];

    public function getFullnameAttribute(){
        return "{$this->title} {$this->first_name} {$this->last_name}";
    }

    public function getNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
}
