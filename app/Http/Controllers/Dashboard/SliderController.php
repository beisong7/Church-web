<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\Slider;
use App\Traits\General\Utility;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use Utility;
    //
    public function index(Request $request){
        $sliders = Slider::where('active', true)->take(25)->get();
        return view('admin.pages.slider.index')->with(['sliders'=>$sliders]);
    }

    public function add(Request $request, $uuid){
        //check image width : 1920
        $image = ImageUpload::where('uuid', $uuid)->first();
        if($image->width >= 1920){
            //check if image exist
            $exist = Slider::where('image_id', $uuid)->first();
            if(!empty($exist)){
                return back()->withErrors(['Image already exist']);
            }
            $slider = new Slider();
            $slider->uuid = $this->generateId();
            $slider->image_id = $uuid;
            $slider->active = true;
            $slider->save();
            return back()->withMessage('New slider image added successfully');
        }
        return back()->withErrors(['Image width below required size. select image with width of 1920px']);
    }

    public function pop(Request $request){
        $uuid = $request->input('uuid');
        if(!empty($uuid)){
            $slider = Slider::where('uuid', $uuid)->first();
            if(!empty($slider)){
                $slider->delete();
                return response()->json(['success'=>true], 200);
            }
            return response()->json(['message'=>'oops, item missing'], 403);
        }
        return response()->json(['message'=>'oops, cant find item - '.$uuid], 403);
    }
}
