<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:52 PM
 */
namespace App\Repository;
use App\Models\Sermons;
use App\Traits\Repo\RepoTrait;

class SermonRepository
{
    use RepoTrait;
    public function allSermon($pagination=null, $selection = null, $order=null){
        $query = Sermons::where('id', '!=' , null);

        return $this->modify($query, $pagination, $selection, $order);
    }

    public function loadSermon($pagination=null, $selection = null, $order=null){
        $query = Sermons::where('id', '!=' , null);

        $query->orderBy($order[0],$order[1]);

        return $query->take(60)->get();
    }

    public function oneWith($key, $val){
        return Sermons::where($key, $val)->first();
    }


}