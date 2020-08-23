<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:52 PM
 */
namespace App\Repository;
use App\Models\Service;
use App\Traits\Repo\RepoTrait;

class ServiceRepository
{
    use RepoTrait;
    public function allServices($pagination=null, $selection = null, $order=null){
        $query = Service::where('id', '!=' , null);

        return $this->modify($query, $pagination, $selection, $order);
    }

    public function loadServices($pagination=null, $selection = null, $order=null){
        $query = Service::where('id', '!=' , null);

        $query->orderBy($order[0],$order[1]);

        return $query->take(60)->get();


    }


}