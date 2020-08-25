<?php

namespace App\Traits\Repo;

trait RepoTrait {

    public function modify($query, $paginate=null, $selection=null, $order=null, $first=false, $takeAmount=null){

        if(!empty($selection)){
            $query->select($selection);
        }

        if(!empty($order)){
            $query->orderBy($order[0],$order[1]);
        }

        if(!empty($paginate)){
            return $query->paginate($paginate)->onEachSide(2);
        }else{
            if($first){
                return $query->first();
            }elseif (!empty($takeAmount)){
                return $query->take($takeAmount)->get();
            }else{
                return $query->get();
            }
        }


    }

}