<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'uuid',
        'name',
        'modify_users',
        'modify_roles',
        'modify_wsf_outline',
        'modify_pages',
        'modify_sermons',
        'modify_service',
        'modify_site_info',
        'modify_sliders',
        'modify_testimony',
        'modify_files',
        'modify_unique',
        'active',
    ];

    public function users(){
        return $this->hasManyThrough(User::class, UserRoles::class, 'role_id','uuid', 'uuid', 'user_id');
    }
}
