<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:52 PM
 */
namespace App\Repository;
use App\Traits\Repo\RepoTrait;
use App\User;

class AdminRepository
{
    use RepoTrait;
    public function allAdmin($pagination=null, $selection = null, $order=null){
        $query = User::where('id', '!=' , null);

        return $this->modify($query, $pagination);
    }
}