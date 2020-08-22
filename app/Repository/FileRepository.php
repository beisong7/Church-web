<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:52 PM
 */
namespace App\Repository;
use App\Models\ImageUpload;
use App\Traits\Repo\RepoTrait;


class FileRepository
{
    use RepoTrait;
    public function allOutline($pagination=null, $selection = null, $order=null){
        $query = ImageUpload::where('id', '!=' , null);

        return $this->modify($query, $pagination);
    }

    public function allExtType($type, $pagination=null, $selection = null, $order=null){
        $query = ImageUpload::where('ext', $type);

        return $this->modify($query, $pagination);
    }
}