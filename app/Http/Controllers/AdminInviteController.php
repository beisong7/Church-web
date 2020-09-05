<?php

namespace App\Http\Controllers;

use App\Models\AdminInvite;
use App\Services\RoleServices;
use App\Traits\Email\MailCart;
use App\Traits\General\Utility;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminInviteController extends Controller
{
    use MailCart, Utility;
    //

    protected $roleServices;

    public function __construct(RoleServices $roleServices){
        $this->roleServices = $roleServices;
    }

    public function startAccept(Request $request, $token){

        $now=time();
        $invite = AdminInvite::where('token', $token)->where('active', true)->where('expire', '>=', $now)->first();
        if(!empty($invite)){
            //check if user has account
            $admin = User::where('email', $invite->email)->first();
            if(empty($admin)){
                // - no - open page to register
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

            session(['action_message'=>$response['message']]);
            return redirect()->route('action.success');
        }

        //return to failed empty dead end
        return redirect()->route('action.failed');
    }

    public function actionFailed(Request $request){
        //use session to transport the data
        $message = session('action_message');
        if(empty($message)){
            $message = null;
        }

        $request->session()->forget('action_message');
        return view('park.page.actions.failed')->with(['message'=>$message]);
    }

    public function actionSuccess(Request $request){
        //use session to transport the data
        $message = session('action_message');
        if(empty($message)){
            $message = null;
        }

        $request->session()->forget('action_message');

        return view('park.page.actions.success')->with(['message'=>$message]);
    }

    //complete new admin invite registration
    public function submitNewAdmin(Request $request, $uuid){

        $now=time();
        $invite = AdminInvite::where('uuid', $uuid)->where('active', true)->where('expire', '>=', $now)->first();
        if(!empty($invite)){

            return $this->roleServices->submitNewAdminInvite($request, $invite);
        }

        return back()->withErrors(['Invitation data not found']);

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
