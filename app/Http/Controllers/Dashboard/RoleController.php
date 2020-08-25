<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Services\RoleServices;
use App\Traits\General\Utility;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Utility;
    
    protected $roleServices;
    
    function __construct(RoleServices $roles)
    {
        $this->roleServices = $roles;
    }

    public function index(Request $request)
    {

        return view('admin.pages.role.index')
            ->with([
                'roles'=>$this->roleServices->loadRoles()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list1 = [
            'modify_users',
            'modify_roles',
            'modify_wsf_outline',
            'modify_pages',
            'modify_sermons',
            'modify_service',
        ];
        $list2 = [
            'modify_site_info',
            'modify_sliders',
            'modify_testimony',
            'modify_files',
            'modify_unique',
        ];
        return view('admin.pages.role.create')
            ->with([
                'list1'=>$list1,
                'list2'=>$list2,
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
        $exist = Role::where('name', $request->input('name'))->first();
        if(!empty($exist)){
            return back()->withErrors(['Role with similar name already exist'])->withInput();
        }
        $role = new Role();

        $role->uuid = $this->generateId();
        $role->name = $request->input('name');
        $role->modify_users = $request->input('modify_users')==='on'?true:false;
        $role->modify_roles = $request->input('modify_roles')==='on'?true:false;
        $role->modify_wsf_outline = $request->input('modify_wsf_outline')==='on'?true:false;
        $role->modify_pages = $request->input('modify_pages')==='on'?true:false;
        $role->modify_sermons = $request->input('modify_sermons')==='on'?true:false;
        $role->modify_service = $request->input('modify_service')==='on'?true:false;
        $role->modify_site_info = $request->input('modify_site_info')==='on'?true:false;
        $role->modify_sliders = $request->input('modify_sliders')==='on'?true:false;
        $role->modify_testimony = $request->input('modify_testimony')==='on'?true:false;
        $role->modify_files = $request->input('modify_files')==='on'?true:false;
        $role->modify_unique = $request->input('modify_unique')==='on'?true:false;
        $role->active = true;
        $role->save();
        return redirect()->route('role.index')->withMessage('New Role Created and Activated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $Role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $Role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $Role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $Role)
    {
        //
    }

    public function delete(Request $request){
        $uuid = $request->input('uuid');
        if(!empty($uuid)){
            $role = Role::where('uuid', $uuid)->first();
            if(!empty($role)){
                $role->delete();
                return response()->json(['success'=>true], 200);
            }
            return response()->json(['message'=>'oops, item missing'], 403);
        }
        return response()->json(['message'=>'oops, cant find item - '.$uuid], 403);
    }

    public function toggleCurrent($uuid){
        $role = Role::where('uuid', $uuid)->first();
        if(!empty($role)){

            if($role->active){
                $msg = $role->name ." removed from Active ";
                $role->active = false;
            }else{
                $msg = $role->name ." now Active ";
                $role->active = true;
            }

            $role->update();

            return back()->withMessage($msg);
        }
        return redirect()->route('role.index')->withErrors(['Resource not found']);
    }
}
