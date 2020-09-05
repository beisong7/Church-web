<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:51 PM
 */
namespace App\Services;
use App\Models\AdminInvite;
use App\Models\UserRoles;
use App\Repository\RoleRepository;
use App\Traits\Email\MailCart;
use App\Traits\General\Utility;
use App\User;
use Illuminate\Http\Request;

class RoleServices extends  RoleRepository
{
    use Utility, MailCart;

    public function assignRole($invite, $userId){
        $roleId = $invite->role_id;
        $role = $this->oneWith('uuid', $roleId, true);
        $user = User::where('active', true)->where('uuid', $userId)->first();
        if(!empty($role)){
            //ensure that user does is not disabled
            if(!empty($user)){
                //ensure that the user does not have role
                $roleExist = UserRoles::where('user_id', $userId)->where('role_id', $roleId)->first();
                if(!empty($roleExist)){
                    //
                    $invite->active = false;
                    $res['message'] = $user->first_name ." already has access to this role.";
                    return $res;
                }

                $urole = new UserRoles();
                $urole->uuid = $this->generateId();
                $urole->user_id = $userId;
                $urole->role_id = $roleId;
                $urole->save();

                //send email notification
                $this->adminNewRole($user->email, $user->first_name, $role->name);

                $res['message'] = "New role assigned to ".$user->first_name.". Login to Continue";
                return $res;
            }
        }

        $res['message'] = "Role or user not found. The role or user might be disable or deleted.";
        return $res;
    }

    public function submitNewAdminInvite(Request $request, $invite){
        //check if email already exist
        $email = $invite->email;
        $user = User::where('email', $email)->first();
        if(!empty($user)){
            //add role to user
            $res = $this->assignRole($invite, $user->uuid);
            return back()->withMessage($res['message']);
        }

        //check that password match
        $pass1 = $request->input('password');
        $pass2 = $request->input('confirm_password');

        if($pass1===$pass2){
            $admin = new User();
            $admin->uuid = $this->generateId();
            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->username = $request->input('username');
            $admin->email = $email;
            $admin->active = true;
            $admin->password = bcrypt($pass1);
            $admin->save();

            $invite->active = false;

            $res = $this->assignRole($invite, $admin->uuid);
            session(['action_message'=>$res['message']]);
            return redirect()->route('action.success');
        }

        return back()->withErrors(['Password does not match.'])->withInput();
    }
}