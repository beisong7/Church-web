<?php

namespace App\Http\Controllers;

use App\Models\Sermons;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Manage the Front users UI for sermons
     *
     */
    public function index()
    {
        $sermons = Sermons::where('published', true)->take(6)->get();
        $popular = Sermons::where('published', true)->orderBy('hits', 'desc')->take(6)->get();
        return view('otherpage.sermon.index')->with(
            [
                'sermons'=>$sermons,
                'popular'=>$popular
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function readNow(Request $request, $uuid){
        $sermon = Sermons::whereUuid($uuid)->first();
        $sermons = Sermons::orderBy('date', 'desc')->where('uuid', '!=',$uuid)->where('published', true)->take(5)->get();

        $sermon->increment('hits', 1);
        if(!empty($sermon)){
            return view('otherpage.sermon.read')->with(
                [
                    'sermon'=>$sermon,
                    'sermons'=>$sermons,
                ]
            );
        }
        return back();
    }
}
