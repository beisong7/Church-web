<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\Thumb;
use App\Traits\General\Utility;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as TImage;


class ImageUploadController extends Controller
{
    use Utility;
    public function uploadFiles(Request $request) {
//        return $request->all();
//
        $file = $request->file('file');

        //check if name exist
        $fileNameOnly = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $extension = strtolower($file->getClientOriginalExtension());

        $fileName = strtolower($this->rename($fileNameOnly, $extension));

        $dir = "data/uploads";
        $size = $file->getSize();
        $width = null;
        if($this->isImage(strtolower($extension))){
            $width = TImage::make($file)->width();
        }
        $file->move(public_path($dir),$fileName);

        $url = $dir.'/'.$fileName;
        $image = new ImageUpload();
        $image->url = $url;
        $image->uuid = $this->generateId();
        $image->time = time();
        $image->original_name = $fileNameOnly;
        $image->ext = $extension;
        $image->size = $size;
        $image->width = $width;
        $image->name = $fileName;
        $image->valid = true;
        try{
            //make thumb
            if($this->isImage(strtolower($extension))){
                $this->Thumb($image);
            }
            //SAVE IMAGE
            $image->save();
            return response()->json(["status" => "success", "data" => $image]);
        }catch (\Exception $e){
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

// --------------------- [ Delete image ] -----------------------------

    public function deleteImage(Request $request, $model_id) {
        $name = $request->input('filename');
        $imageUploaded = ImageUpload::where('name', $name)->where('model_id', $model_id)->first();
        if(!empty($imageUploaded)){
            $path = $imageUploaded->url;
            if (file_exists($path)) {
                unlink($path);
            }
            $filename = $imageUploaded->name;

            //delete thumb
            $thumb = $imageUploaded->thumb;
            if(!empty($thumb)){
                if (file_exists($thumb->url)) {
                    unlink($thumb->url);
                }
                $thumb->delete();
            }

            $imageUploaded->delete();
            return $filename;
        }

        return [false, $name];

    }

    public function Thumb($image, $waterMark = null){
        //new instance
        $thumb = TImage::make($image->url);

        $width = 200;
        $height = (200/$thumb->width())*$thumb->height();

        //open image file
        $thumb->resize($width, $height);

        // and insert a watermark for example
        if(!empty($waterMark)){
            $thumb->insert($waterMark);
        }

        //new thumb model

        $dbThumb = new Thumb();
        $dir = "data/thumb/".$image->name;
        $dbThumb->url = $dir;
        $dbThumb->uuid = $image->uuid;
        $path = public_path("data/thumb")."/".$image->name;
        // finally we save the image as a new file

        try{
            $thumb->save($path);
            $dbThumb->save();
        }catch (\Exception $e){
            try{
                $dir = "data/thumb";
                $this->makeDirectory($dir);
                $thumb->save($path);
                $dbThumb->save();
            }catch (\Exception $e){

            }
        }

    }

    public function rename($name, $ext){
        $exist = ImageUpload::where('original_name', $name)
            ->where('ext', $ext)
            ->get();

        if(count($exist) > 0){
            $count = $exist->count();
            $newName = $name."_$count.".$ext;
            return $newName;
        }else{
            return $name.".".$ext;
        }

        //check number of filename and extension in folder
    }

    public function isImage($ext){
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if(in_array($ext, $allowed)){
            return true;
        }
        return false;
    }

}
