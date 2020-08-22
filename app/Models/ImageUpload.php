<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $fillable = [
        'url',
        'uuid',
        'model_id',
        'ext',
        'original_name',
        'name',
        'size',
        'width',
        'time',
        'valid',
    ];

    public function getSizedAttribute(){
        //6 digits is kb
        //7 digits is MB
        if(!empty($this->size )){
            $mb = 1000000;
            $rSize = number_format($this->size /1000, 1);
            $qt = "kb";
            if($rSize>=$mb){
                $qt = "mb";
            }
            return strval($rSize).$qt;
        }
        return "0 kb";
    }

    public function thumbnail(){
        return $this->hasOne(Thumb::class, 'uuid', 'uuid');
    }

    public function getImageAttribute(){
        return url($this->url);
    }

    public function getThumbAttribute(){
        return url($this->thumbnail->url);
    }

    public function getIsImgAttribute(){
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if(in_array($this->ext, $allowed)){
            return true;
        }
        return false;
    }

    public function getIconAttribute(){
//        return 'file';
        switch (strtolower($this->ext)){
            case 'pdf':
                return 'file-pdf-o';
                break;
            default:
                return 'file';
        }
    }

}
