<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminInvite extends Model
{
    //
    protected $fillable = [
        'uuid',
        'expire',
        'token',
        'role_id',
        'email',
        'active',
    ];

    public function role(){
        return $this->hasOne(Role::class, 'uuid', 'role_id');
    }
}
