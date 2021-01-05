<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\Media;
use App\Models\MediaItem;
use App\Models\Slider;
use App\Traits\General\Utility;
use function GuzzleHttp\Psr7\modify_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    use Utility;
    //
    public function galleryList(Request $request){
        $type = $request->input('type');

        $files = $this->setMediaContent($type);
        return view('admin.pages.files.gallery')->with([
            'files'=>$files,
            'model'=>$request->input('model'),
            'type'=>$type,
            'return'=>$request->input('return'),
            'anchor'=>$request->input('anchor'),
            'action'=>$request->input('action')
        ]);
    }

    private function setMediaContent($type){
        $resources = [];
        if($type==='image'){
            $resources = ImageUpload::where('ext', 'jpg')
                ->orWhere('ext', 'jpeg')
                ->orWhere('ext', 'gif')
                ->orWhere('ext', 'png')
                ->paginate(15);
        }

        if($type==='all'){
            $resources = ImageUpload::paginate(15);
        }

        return $resources;
    }

    public function addtomedia(Request $request){
        $res = $this->addResourceToModel($request);
        if($res[0]){
            return back()->withMessage($res[1]);
        }else{
            return back()->withErrors([$res[1]]);
        }

    }

    private function addResourceToModel($request){
        $model = $request->input('model');
        $file_id = $request->input('uuid');
        $anchor = $request->input('anchor');

        if(strtolower($model)==='slider'){
            //check image width : 1920
            $image = ImageUpload::where('uuid', $file_id)->first();
            if($image->width >= 1920){
                //check if image exist
                $exist = Slider::where('image_id', $file_id)->first();
                if(!empty($exist)){

                    return [false, 'Image already exist'];
                }
                $slider = new Slider();
                $slider->uuid = $this->generateId();
                $slider->image_id = $file_id;
                $slider->active = true;
                $slider->save();
                return [true,'New slider image added successfully'];
            }
            return [false,'Image width below required size. select image with width of 1920px'];
        }

        if(strtolower($model)==='media'){
            $media = Media::where('uuid', $anchor)->first();
            if(!empty($media)){
                $exist = MediaItem::where('media_id', $media->uuid)->where('file_id', $file_id)->first();
                if(!empty($exist)){

                    return [false, 'File already exist in Media group'];
                }
                $mediaItem['uuid'] = $this->generateId();
                $mediaItem['media_id'] = $media->uuid;
                $mediaItem['file_id'] = $file_id;
                $mediaItem['author_id'] = $request->user()->uuid;
                $mediaItem['download_count'] = 0;
                $mediaItem['view_count'] = 0;
                DB::beginTransaction();
                MediaItem::create($mediaItem);
                DB::commit();
                return [true, "One item added to Media Group"];
            }
            return [false, "Media target resource not found"];
        }
    }
}
