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

class RoleRepository
{
    use RepoTrait;
    public function allRoles($pagination=null, $selection = null, $order=null){
        $query = Role::where('id', '!=' , null);

        return $this->modify($query, $pagination, $selection, $order);
    }

    public function loadRoles($amount = null, $pagination=null, $selection = null, $order=null){
        $query = Role::where('id', '!=' , null);

        if(empty($amount)){
            $amount = 50;
        }

        return $this->modify($query, $pagination, $selection, $order, null, $amount);
    }

    public function oneWith($key, $val, $active = false){
        $role = Role::where($key, $val)->first();
        if($active){
            return $role->active?$role:null;
        }
        return $role;
    }


}