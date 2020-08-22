<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\WsfOutline;
use App\Services\FileServices;
use App\Services\WsfServices;
use App\Traits\General\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WsfOutlineController extends Controller
{
    use Utility;
    protected $wsfServices;
    protected  $fileServices;

    function __construct(WsfServices $wsfServices, FileServices $fileServices)
    {
        $this->wsfServices = $wsfServices;
        $this->fileServices = $fileServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('admin.pages.wsf_outline.index')
            ->with([
                'outlines'=>$this->wsfServices->allOutline()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.wsf_outline.create')
            ->with([
                'files'=>$this->fileServices->allExtType('pdf')
            ]);
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
        $outline = new WsfOutline();
        $outline->uuid = $this->generateId();
        $outline->file_id = $request->input('file_id');
        $outline->name = $request->input('name');
        $outline->active = true;
        $outline->dfh = strtotime($request->input('dfh'));
        $outline->save();
        return redirect()->route('wsf.index')->withMessage('Outline Created. Set to Current to allow Download');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WsfOutline  $wsfOutline
     * @return \Illuminate\Http\Response
     */
    public function show(WsfOutline $wsfOutline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WsfOutline  $wsfOutline
     * @return \Illuminate\Http\Response
     */
    public function edit(WsfOutline $wsfOutline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WsfOutline  $wsfOutline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WsfOutline $wsfOutline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WsfOutline  $wsfOutline
     * @return \Illuminate\Http\Response
     */
    public function destroy(WsfOutline $wsfOutline)
    {
        //
    }

    public function delete(Request $request){
        $uuid = $request->input('uuid');
        if(!empty($uuid)){
            $outline = WsfOutline::where('uuid', $uuid)->first();
            if(!empty($outline)){
                $outline->delete();
                return response()->json(['success'=>true], 200);
            }
            return response()->json(['message'=>'oops, item missing'], 403);
        }
        return response()->json(['message'=>'oops, cant find item - '.$uuid], 403);
    }

    public function toggleCurrent($uuid){
        $outline = WsfOutline::where('uuid', $uuid)->first();
        if(!empty($outline)){

            $currents = WsfOutline::where('current', true)->get();
            if($currents->count()>0){
                $msg= "Active outline switched to ".$outline->name;
                foreach ($currents as $item){
                    $item->current = false;
                    $item->update();
                }
            }
            if($outline->current){
                $msg = $outline->name ." removed from Active ";
                $outline->current = false;
            }else{
                $msg = $outline->name ." now Active ";
                $outline->current = true;
            }

            $outline->update();

            return back()->withMessage($msg);
        }
        return redirect()->route('wsf.index')->withErrors(['Resource not found']);
    }

    public function download($uuid){
        $outline = WsfOutline::where('uuid', $uuid)->first();
        if(!empty($outline)){
            return response()->download($outline->file->url);
        }
    }
}
