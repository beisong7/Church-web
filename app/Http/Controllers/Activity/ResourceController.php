<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\ImageUpload;
use App\Models\Media;
use App\Models\MediaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

//                dd($media->download_count);

                DB::beginTransaction();
                $score = $media->download_count + 1;
                $data['download_count'] = $score;
                $media->update($data);
                $date = date('F d, Y');
                $download = Download::where('date', $date)->first();
                if(empty($download)){
                    $down['date'] = date('F d, Y');
                    $down['count'] = 1;
                    Download::create($down);
                }else{
                    $down['count'] = 1 + $download->count;
                    $download->update($down);
                }

                DB::commit();

                return response()->download($media->file->url);
            }
            return back()->withErrors(['Media resource not found. Might have been moved. Sorry.']);
        }catch (\Exception $e){
            return back()->withErrors(['Media resource not found. Might have been moved. Sorry.']);
        }

    }
}
