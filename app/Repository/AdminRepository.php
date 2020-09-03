<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:52 PM
 */
namespace App\Repository;
use App\Models\Role;
use App\Traits\Repo\RepoTrait;
use App\User;

class AdminRepository
{
    use RepoTrait;
    public function allAdmin($pagination=null, $selection = null, $order=null){
        $query = User::where('id', '!=' , null);

        return $this->modify($query, $pagination);
    }

    public function getActiveRoles(){
        return Role::where('active', true)->select(['uuid', 'name'])->get();
    }

    public function oneWith($key, $val){
        return User::where($key, $val)->first();
    }
}