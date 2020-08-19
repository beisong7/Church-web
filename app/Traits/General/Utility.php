<?php

namespace App\Traits\General;

use Illuminate\Support\Str;

trait Utility{
    public function generateId($prefix=null){
        $uuid = (string)Str::uuid();
        return !empty($prefix)?$prefix."-".$uuid:$uuid;
    }

    public function randomName($length=null){
        if(empty($length)){$length=10;};
        $token = "";
        $codes = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codes .= "abcdefghijklmnopqrstuvwxyz";
        $codes .= "0123456789";
        $max = strlen($codes);
        for($i=0; $i < $length; $i++){
            $token.= $codes[random_int(0, $max-1)];
        }
        return $token;
    }

    public function makeDirectory($dir){
        try{
            mkdir(public_path($dir), 0755, true);
        }catch (\Exception $e){

        }
    }
}