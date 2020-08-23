<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'theme',
        'sub_title',
        'instruction',
        'service_time',
        'service_link',
        'date',
        'active',
    ];
}
