<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\SiteSettings;
use App\Models\Slider;
use App\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function __construct()
    {
    }

    public function dashboard(Request $request){
        $admins = User::where('active', true)->select(['id'])->get()->count();
        $sliders = Slider::where('active', true)->select(['id'])->get()->count();
        $files = ImageUpload::where('id', '!=', null)->select(['id'])->get()->count();

        return view('admin.pages.dashboard.index')
            ->with([
                'admins'=>$admins,
                'sliders'=>$sliders,
                'files'=>$files,
            ]);
    }

    public function filesUpload(Request $request){
        return view('admin.pages.files.upload');
    }

    public function files(Request $request){
        $files = ImageUpload::where('valid', true)->paginate(15);
        return view('admin.pages.files.index')->with(['files'=>$files]);
    }

    public  function siteInfo(Request $request){
        $site = SiteSettings::first();
        if(empty($site)){
            $site = new SiteSettings();
        }
        return view('admin.pages.site.index')->with(['site'=>$site]);
    }

    public  function siteInfoUpdate(Request $request){
        $id = $request->input('id');

        $exist = true;
        $site = SiteSettings::where('id', $id)->first();
        if(empty($site)){
            $exist = false;
            $site = new SiteSettings();
        }
        $site->home_title = $request->input('home_title');
        $site->home_subtitle = $request->input('home_subtitle');
        $site->about_title = $request->input('about_title');
        $site->about_body = $request->input('about_body');
        $site->about_extra = $request->input('about_extra');
        $site->service_info = $request->input('service_info');
        $site->service_extra = $request->input('service_extra');
        $site->email = $request->input('email');
        $site->phone = $request->input('phone');
        $site->address = $request->input('address');
        $site->facebook = $request->input('facebook');
        $site->twitter = $request->input('twitter');
        $site->instagram = $request->input('instagram');
        $site->youtube = $request->input('youtube');

        if($exist){
            $site->update();
        }else{
            $site->save();
        }
        return back()->withMessage('Site information updated');
    }

}
