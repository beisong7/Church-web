<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\MediaItem;
use App\Traits\General\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    use Utility;
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $mediaGroup = Media::paginate(50);
        return view('admin.pages.media.index')
            ->with([
                'media_group'=>$mediaGroup
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:media'
        ]);


        $data['uuid'] = $this->generateId();
        $data['author_id'] = $request->user()->uuid;
        $data['title'] = $request->input('title');
        $data['slug'] = $request->input('slug');
        $data['info'] = $request->input('info');
        $data['active'] = true;

        DB::beginTransaction();
        Media::create($data);
        DB::commit();

        return redirect()->route('media.index')->withMessage('New media group created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($uuid)
    {
        $media = Media::whereUuid($uuid)->first();
        if(!empty($media)){
            return view('admin.pages.media.show')->with(['media'=>$media]);
        }
        return back()->withErrors(['Resource not found']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($uuid)
    {
        $media = Media::whereUuid($uuid)->first();
        if(!empty($media)){
            return view('admin.pages.media.edit')->with(['media'=>$media]);
        }
        return back()->withErrors(['Resources not found']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $uuid)
    {
        $media = Media::whereUuid($uuid)->first();
        if(!empty($media)){
            $request->validate([
                'title'=>'required',
                'slug'=>'required'
            ]);
            $slug = $request->input('slug');

            $exist = Media::where('slug', $slug)->where('uuid', '!=', $uuid)->first();
            if(!empty($exist)){
                return back()->withErrors(['the title/slug is already in use. select another title/slug']);
            }

            $data['title'] = $request->input('title');
            $data['slug'] = $request->input('slug');
            $data['info'] = $request->input('info');

            DB::beginTransaction();
            $media->update($data);
            DB::commit();
            return back()->withMessage('Group updated');
        }
        return back()->withErrors(['Resources not found']);
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

    public function manage($uuid){
        $media = Media::whereUuid($uuid)->first();
        if(!empty($media)){
            return view('admin.pages.media.manage_resource')->with(['media'=>$media]);
        }
        return back()->withErrors(['Resources not found']);
    }

    public function removeMediaItem($uuid){
        $media = MediaItem::whereUuid($uuid)->first();
        if(!empty($media)){
            $media->delete();
            return back()->withMessage('One item removed from Media Group.');
        }
        return back()->withErrors(['Resources not found']);
    }
}
