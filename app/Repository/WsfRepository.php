<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:52 PM
 */
namespace App\Repository;
use App\Models\WsfOutline;
use App\Traits\Repo\RepoTrait;
use App\User;

class WsfRepository
{
    use RepoTrait;
    public function allOutline($pagination=null, $selection = null, $order=null){
        $query = WsfOutline::where('id', '!=' , null);

        return $this->modify($query, $pagination);
    }
}