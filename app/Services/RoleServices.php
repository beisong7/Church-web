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
                    $res['message'] = "Role already assigned to this user";
                    return $res;
                }

                $urole = new UserRoles();
                $urole->uuid = $this->generateId();
                $urole->user_id = $userId;
                $urole->role_id = $roleId;
                $urole->save();

                //send email notification
                $this->adminNewRole($user->email, $user->first_name, $role->name);

                $res['message'] = "New role assigned to user. Login to Continue";
                return $res;
            }
        }

        $res['message'] = "Role or user not found. The role or user might be disable or deleted.";
        return $res;
    }
}