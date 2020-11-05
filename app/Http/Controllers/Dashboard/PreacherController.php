<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Preacher;
use App\Traits\General\Utility;
use App\Traits\Image\ImageTrait;
use Illuminate\Http\Request;

class PreacherController extends Controller
{
    use ImageTrait, Utility;
    /**
     * Display a listing of the resource.
     *
     */

    protected $services;

    public function __construct()
    {

    }

    public function index()
    {
        $preacher = Preacher::orderBy('id','desc')->select([
            'uuid',
            'title',
            'first_name',
            'last_name',
            'active',
        ])->get();

        return view('admin.pages.preacher.index')
            ->with([
                'preachers'=>$preacher
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.preacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'title'=>'required',
            'last_name'=>'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $resp = $this->uploadImage($request->file('image'), [800, 600]);
            if($resp[0]){
                $data['image'] = $resp[1];
            }else{
                return back()->withErrors([$resp[1]])->withInput();
            }
        }

        $data['uuid'] = $this->generateId();
        $data['active'] = true;

        Preacher::create($data);

        return redirect()->route('preacher.index')->withMessage('New preacher created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preacher  $preacher
     * @return \Illuminate\Http\Response
     */
    public function show(Preacher $preacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preacher  $preacher
     */
    public function edit($uuid)
    {
        $preacher = Preacher::whereUuid($uuid)->first();

        if(!empty($preacher)){
            return view('admin.pages.preacher.edit')->with(
                [
                    'preacher'=>$preacher
                ]
            );
        }

        return redirect()->route('preacher.index')->withErrors(['Resources not found']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preacher  $preacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $preacher = Preacher::whereUuid($uuid)->first();
        if(empty($preacher)){
            return redirect()->route('preacher.index');
        }

        $request->validate([
            'first_name'=>'required',
            'title'=>'required',
            'last_name'=>'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $resp = $this->uploadImage($request->file('image'), [800, 600]);
            if($resp[0]){
                $data['image'] = $resp[1];
                //try unsetting image
                try{
                    unlink($preacher->image);
                }catch (\Exception $e){

                }
            }else{
                return back()->withErrors([$resp[1]])->withInput();
            }
        }

        $preacher->update($data);

        return back()->withMessage('Preacher information updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preacher  $preacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preacher $preacher)
    {
        //
    }
}
