<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SiteSettings;
use App\Models\Slider;
use App\Models\WsfOutline;
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
        $outline = WsfOutline::where('active', true)->where('current', true)->first();
        $services = Service::where('date', '>=', time())->where('active', true)->orderBy('date', 'desc')->get();
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
            'outline'=>$outline,
            'services'=>$services,
        ]);
    }

    public function contactUs(Request $request){

    }
}
