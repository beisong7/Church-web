<?php

namespace App\Http\Controllers;

use App\Models\AdminInvite;
use App\Services\RoleServices;
use App\Traits\Email\MailCart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminInviteController extends Controller
{
    use MailCart;
    //

    protected $roleServices;

    public function __construct(RoleServices $roleServices){
        $this->roleServices = $roleServices;
    }

    public function startAccept(Request $request, $uuid){

        $now=time();
        $invite = AdminInvite::where('uuid', $uuid)->where('active', true)->where('expire', '>=', $now)->first();
        if(!empty($invite)){
            //check if user has account
            $admin = User::where('email', $invite->email)->first();
            if(empty($admin)){
                // - no - open page
                return view('park.page.invite.invite_profile')->with([
                    'invite'=>$invite
                ]);
            }

            // - yes -
            //check if user is logged in
            if(Auth::check()){
                $user = Auth::user();
                if($user->uuid === $admin->uuid){
                    // - yes - assign new role { new role should be a standalone function } and redirect to user roles page
                    $response = $this->roleServices->assignRole($invite, $admin->uuid);

                    return redirect()->route('my.roles')->withMessage($response['message']);
                }
            }


            // - no - assign new role and redirect to login
            $response = $this->roleServices->assignRole($invite, $admin->uuid);

            return redirect()->route('my.roles')->withMessage($response['message']);
        }

        //return to failed empty dead end
        return redirect()->route('action.failed');
    }

    public function actionFailed(){
        //use session to transport the data
        return view('park.page.actions.failed');
    }



    //test invite page email
    public function emailInviteTest(){

        try{
            $this->prepAdminInvite("icekidben@gmail.com", "Benjamin");
            return "Email sent";
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }


}
