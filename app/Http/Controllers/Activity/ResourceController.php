<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\Media;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(){
        $media = Media::where('active', true)->paginate(50);
        return view('otherpage.media.index')->with(
            [
                'media'=>$media,
            ]
        );
    }

    public function mediaContent($slug){
        $media = Media::where('slug', $slug)->first();
        if(!empty($media)){
            return view('otherpage.media.content')->with(
                [
                    'media'=>$media,
                ]
            );
        }
        return back()->withErrors(['Media resource not found. Might have been moved. Sorry.']);
    }

    public function mediaContentDownload(Request $request, $secret){

        try{
            $id = decrypt($secret);
            $media = MediaItem::where('uuid', $id)->first();

            if(!empty($media)){

                $media->increment('download_count');

                return response()->download($media->file->url);
            }
            return back()->withErrors(['Media resource not found. Might have been moved. Sorry.']);
        }catch (\Exception $e){
            return back()->withErrors(['Media resource not found. Might have been moved. Sorry.']);
        }

    }
}
