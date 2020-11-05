<?php

namespace App\Traits\Image;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageTrait {


    public function uploadImage($photo, $dimensions = null){


        $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

        $extension = $photo->getClientOriginalExtension();

        $extension = strtolower($extension);

        $size = $photo->getClientSize();

        if ($size > 600000) {
            return [false, 'Your passport must be of types : jpeg,bmp,png,jpg.'];
        }

        if($dimensions!==null){
            try{
                $height = Image::make($photo)->height();
                $width = Image::make($photo)->width();
                if($width!==$dimensions[0]){
                    return [false, 'Image width does not meet Specifications'];
                }

                if($height!==$dimensions[1]){
                    return [false, 'Image Heifht does not meet Specifications'];
                }
            }catch (\Exception $e){

            }
        }

        $time = Carbon::now();

        $check = in_array(strtolower($extension), $allowedfileExtension);

        $filename = Str::random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

        if ($check) {

            $directory = 'data/uploads';
            $url = $directory . '/' . $filename;

            $photo->move(public_path($directory),$filename);
            //store to thumb

            return [true,$url];

        } else {

            return [false, 'Your passport must be of types : jpeg,bmp,png,jpg.'];

        }

    }

}