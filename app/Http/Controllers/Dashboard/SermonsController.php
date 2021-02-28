<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Preacher;
use App\Models\Sermons;
use App\Services\SermonServices;
use App\Traits\General\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SermonsController extends Controller
{
    use Utility;
    protected $services;

    function __construct(SermonServices $services)
    {
        $this->services = $services;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.pages.sermon.index')
            ->with([
                'sermons'=>$this->services->allSermon(20, null, ['created_at','desc'])
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $preachers = Preacher::select(['first_name','last_name','title','uuid'])->get();
        return view('admin.pages.sermon.create')->with(
            [
                'preachers'=>$preachers
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'title'=>'required',
                'intro'=>'required',
                'info'=>'required',
                'preacher_id'=>'required',
                'date'=>'required',
            ]
        );
        $slug = strtolower($request->input('title'));
        $slug = str_replace(" ", "-", $slug);
        $exist = Sermons::where('slug', $slug)->first();
        if(empty($exist)){
            $data = $request->all();
            $data['date'] = strtotime($request->input('date'));
            $data['uuid'] = $this->generateId();
            $data['slug'] = $slug;
            if($this->services->saveDraft($data)){
                return redirect()->route('sermon.index');
            }
            return back()->withErrors(['Oops something failed. Refersh and try again.'])->withInput();
        }
        return back()->withErrors(['Title already taken, Change title.'])->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sermons  $sermons
     * @return \Illuminate\Http\Response
     */
    public function show(Sermons $sermons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sermons  $sermons
     */
    public function edit($uuid)
    {
        $sermon = Sermons::whereUuid($uuid)->first();
        $preachers = Preacher::select(['first_name','last_name','title','uuid'])->get();
        if(!empty($sermon)){
            return view('admin.pages.sermon.edit')->with([
                'sermon'=>$sermon,
                'preachers'=>$preachers
            ]);
        }
        return redirect()->route('sermon.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sermons  $sermons
     */
    public function update(Request $request, $uuid)
    {
        $sermon = Sermons::whereUuid($uuid)->first();
        if(!empty($sermon)){
            $request->validate(
                [
                    'title'=>'required',
                    'intro'=>'required',
                    'info'=>'required',
                    'preacher_id'=>'required',
                    'date'=>'required',
                ]
            );
            $data = $request->all();
            $data['date'] = strtotime($request->input('date'));

            if($this->services->updateDraft($data, $sermon)){
                return back()->withMessage('Draft Updated Successfully');
            }
            return back()->withErrors(['Oops something failed. Refersh and try again.'])->withInput();
        }

        return redirect()->route('sermon.index')->withErrors(['Resource not found']);


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sermons  $sermons
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sermons $sermons)
    {
        //
    }

    public function toggleCurrent($uuid){
        $sermon = Sermons::whereUuid($uuid)->first();
        if(!empty($sermon)){
            $message = "";
            if($sermon->published){
                $message = "Sermon is now a draft and not available for public viewing";
                $sermon->published = false;
            }else{
                $message = "Sermon is now published and is available for public viewing";
                $sermon->published = true;
            }

            $sermon->update();
            return back()->withMessage($message);
        }
        return redirect()->route('sermon.index')->withErrors(['Resource not found']);
    }

    public function fixSlug(){
        $sermons = Sermons::where('slug', null)->get();
        $failed = 0;
        $count = 0;
        foreach ($sermons as $sermon){
            $slug = str_replace(" ", "-", strtolower($sermon->title));
            $exist = Sermons::where('slug', $slug)->first();
            if(empty($exist)){
                $data['slug'] = $slug;
                DB::beginTransaction();
                $sermon->update($data);
                DB::commit();
                $count++;
            }else{
                $failed++;
            }
        }

        return["message"=>"Completed {$count} | {$failed} Failed!"];
    }
}
