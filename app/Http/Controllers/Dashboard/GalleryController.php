<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function galleryList(Request $request){
        $images = ImageUpload::where('ext', 'jpg')
            ->orWhere('ext', 'jpeg')
            ->orWhere('ext', 'gif')
            ->orWhere('ext', 'png')
            ->paginate(15);
        return view('admin.pages.files.gallery')->with([
            'files'=>$images,
            'model'=>$request->input('model')
        ]);
    }
}
