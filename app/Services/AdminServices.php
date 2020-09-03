<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:51 PM
 */
namespace App\Services;
use App\Models\AdminInvite;
use App\Models\Role;
use App\Repository\AdminRepository;
use App\Traits\Email\MailCart;
use App\Traits\General\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminServices extends  AdminRepository
{
    use Utility, MailCart;
    public function sendNewRoleInvite(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required|max:50',
            'role' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors([$validator->messages()->first()]);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $role_id = $request->input('role_id');
        $role = Role::where('uuid', $role_id)->where('active', true)->first();

        if(!empty($role)){

            $role_name = $role->name;

            $invite = new AdminInvite();
            $day = 86400;
            $time  = time() + ($day*3);
            $token = $this->randomName(40);
            $uuid = $this->generateId();

            $invite->uuid = $uuid;
            $invite->expire = $time;
            $invite->token = $token;
            $invite->role_id = $role_id;
            $invite->email = $email;
            $invite->active = true;
            $invite->save();

            //send email
            $this->prepAdminInvite($email, $name, $uuid, $role_name);

            return back()->withMessage("Your invite for a new role ($role_name) has been sent to $email");
        }

        return back()->withErrors(['Role not valid']);




    }

}