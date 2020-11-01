<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:51 PM
 */
namespace App\Services;
use App\Models\Sermons;
use App\Repository\SermonRepository;

class SermonServices extends  SermonRepository
{
    public function saveDraft($data){
        try{
            $data['active'] = true;
            Sermons::create($data);
            return true;
        }catch (\Exception $e){
            dd($e->getMessage());
            return false;
        }
    }


    public function updateDraft($data, $sermon){
        try{
            $sermon->update($data);
            return true;
        }catch (\Exception $e){
            //dd($e->getMessage());
            return false;
        }
    }

    public function publish($sermon){
        $sermon->published = true;
        $sermon->update();
    }

    public function dropPublication($sermon){
        $sermon->published = false;
        $sermon->update();
    }
}