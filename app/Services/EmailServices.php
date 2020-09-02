<?php

/**
 * Created by PhpStorm.
 * User: synergynode
 * Date: 21/08/2020
 * Time: 2:51 PM
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Repository\RoleRepository;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailServices extends  Controller
{
    public $aname;
    public $view; //view name
    public $reciever; //email to
    public $sender; // email from
    public $subject; // email subject
    public $title; // email title
    public $receiverTitle; // receivers title/name
    public $data; // data array - example ['link'=>route('linkname'), ...]

    public function sendEmail(){
        $to = $this->reciever;
        $receiverTitle = $this->receiverTitle;
        $title = $this->title;
        $view = $this->view;
        $from = $this->sender;
        $data = $this->data;
        $subject = $this->subject;

        Mail::send($view, $data, function ($message) use ($from, $to, $title,$subject, $receiverTitle) {
            $message->from($from, $title);
            $message->to($to, $receiverTitle)->subject($subject);
        });
    }

}