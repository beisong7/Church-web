<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $fillable = [
        'home_title',
        'home_subtitle',
        'about_title',
        'about_body',
        'about_extra',
        'service_info',
        'service_extra',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
    ];
}
