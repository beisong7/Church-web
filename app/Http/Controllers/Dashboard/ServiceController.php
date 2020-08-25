<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use App\Services\ServiceServices;
use App\Traits\General\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    use Utility;
    protected $services;
    

    function __construct(ServiceServices $services)
    {
        $this->services = $services;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('admin.pages.service.index')
            ->with([
                'services'=>$this->services->loadServices(null, null, ['date','desc'])
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->uuid = $this->generateId();
        $service->title = $request->input('title');
        $service->theme = $request->input('theme');
        $service->sub_title = $request->input('sub_title');
        $service->instruction = $request->input('instruction');
        $service->service_time = $request->input('service_time');
        $service->service_link = $request->input('service_link');
        $service->date = strtotime($request->input('date'));
        $service->active = false;
        $service->save();
        return redirect()->route('service.index')->withMessage('New Service Created. Activate to set live');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        //
    }


    public function edit( $uuid)
    {
        $service = $this->services->oneWith('uuid', $uuid);
        if(!empty($service)){
            return view('admin.pages.service.edit', compact('service'));
        }
        return redirect()->route('service.index')->withMessage('Resource not found.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {

        $service = $this->services->oneWith('uuid', $uuid);
        if(!empty($service)){
            $service->title = $request->input('title');
            $service->theme = $request->input('theme');
            $service->sub_title = $request->input('sub_title');
            $service->instruction = $request->input('instruction');
            $service->service_time = $request->input('service_time');
            $service->service_link = $request->input('service_link');
            $service->date = strtotime($request->input('date'));
            $service->update();
            return back()->withMessage('Service updated successfully');
        }

        return redirect()->route('service.index')->withMessage('Resource not found.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $Service)
    {
        //
    }

    public function delete(Request $request){
        $uuid = $request->input('uuid');
        if(!empty($uuid)){
            $service = Service::where('uuid', $uuid)->first();
            if(!empty($service)){
                $service->delete();
                return response()->json(['success'=>true], 200);
            }
            return response()->json(['message'=>'oops, item missing'], 403);
        }
        return response()->json(['message'=>'oops, cant find item - '.$uuid], 403);
    }

    public function toggleCurrent($uuid){
        $service = Service::where('uuid', $uuid)->first();
        if(!empty($service)){

            if($service->active){
                $msg = $service->name ." removed from Active ";
                $service->active = false;
            }else{
                $msg = $service->name ." now Active ";
                $service->active = true;
            }

            $service->update();

            return back()->withMessage($msg);
        }
        return redirect()->route('service.index')->withErrors(['Resource not found']);
    }

    public function download($uuid){
        $service = Service::where('uuid', $uuid)->first();
        if(!empty($service)){
            return response()->download($service->file->url);
        }
    }
}
