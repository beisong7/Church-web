<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function __construct()
    {
    }

    public function dashboard(Request $request){
        return view('admin.pages.dashboard.index');
    }

    public function filesUpload(Request $request){
        return view('admin.pages.files.upload');
    }

    public function files(Request $request){
        $files = ImageUpload::where('valid', true)->paginate(15);
        return view('admin.pages.files.index')->with(['files'=>$files]);
    }
}
