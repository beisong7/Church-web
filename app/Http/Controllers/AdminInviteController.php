<?php

namespace App\Http\Controllers;

use App\Traits\Email\MailCart;
use Illuminate\Http\Request;

class AdminInviteController extends Controller
{
    use MailCart;
    //

    public function test(){
//        $this->testName();

        try{
            $this->prepAdminInvite("icekidben@gmail.com", "Benjamin");
            return "Email sent";
        }catch (\Exception $e){
            return $e->getMessage();
        }


    }
}
