<?php

namespace App\Http\Controllers;

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
        $slides = "";
        foreach ($sliders as $slider){
            $slides.= $slider->image->url."|";
        }
//        return $slides;
        return view('pages.home')->with([
            'slides'=>$slides
        ]);
    }
}
