<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    //
    protected $fillable = [
        'uuid',
        'user_id',
        'role_id',
    ];
}
