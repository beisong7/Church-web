<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sermons extends Model
{
    protected $fillable = [
        'uuid',
        'author_id',
        'series_id',
        'slug',
        'title',
        'sub_title',
        'intro',
        'theme',
        'info',
        'preacher_id',
        'category_id',
        'tags',
        'type',
        'keywords',
        'banner',
        'published',
        'hits',
        'shares',
        'date',
    ];

    public function preacher(){
        return $this->hasOne(Preacher::class, 'uuid', 'preacher_id');
    }

    public function getIntroductionAttribute(){
        return Str::words($this->intro, 14, '...');
    }

    public function getheadingAttribute(){
        return Str::words($this->title, $limit = 7, $end = '...');
    }
}
