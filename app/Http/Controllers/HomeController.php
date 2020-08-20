<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('active', true)->get();
        $site = SiteSettings::first();
        if(empty($site)){
            $site = new SiteSettings();
        }
        $slides = "";
        foreach ($sliders as $slider){
            $slides.= $slider->image->url."|";
        }
//        return $slides;
        return view('pages.home')->with([
            'slides'=>$slides,
            'site'=>$site,
        ]);
    }

    public function contactUs(Request $request){

    }
}
