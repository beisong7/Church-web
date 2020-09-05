<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminServices;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $adminServices;

    public function __construct(AdminServices $services)
    {
        $this->adminServices = $services;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.admin.index')->with([
            'admins'=>$this->adminServices->allAdmin(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->adminServices->getActiveRoles();
        return view('admin.pages.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit($uuid)
    {
        $admin = $this->adminServices->oneWith('uuid', $uuid);
        $roles = $this->adminServices->getActiveRoles();
        return view('admin.pages.admin.edit')->with([
            'roles'=>$roles,
            'admin'=>$admin
        ]);

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

    public function pop(Request $request){
        $admin = $request->user();
        $uuid = $request->input('uuid');
        if(!empty($uuid)){
            $user = User::where('uuid', $uuid)->first();
            if(!empty($user) && $user->uuid!==$admin->uuid){
                $user->active = false;
                $user->update();
                return response()->json(['success'=>true], 200);
            }
            return response()->json(['message'=>'oops, item missing'], 403);
        }
        return response()->json(['message'=>'oops, cant find item - '.$uuid], 403);
    }

    public function startInvite(){
        return view('admin.pages.admin.invite')->with([
            'roles'=>$this->adminServices->getActiveRoles(),
        ]);
    }

    public function sendRoleInvite(Request $request){

        return $this->adminServices->sendNewRoleInvite($request);
    }
}
