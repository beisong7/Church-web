<?php

namespace App\Traits\Email;

use App\Services\EmailServices;

trait MailCart{

    protected $emailService;

    function __construct(EmailServices $services)
    {
        $this->emailService = $services;
    }

    public function prepAdminInvite($email, $name){
        $this->emailService->view = "email.admin_invite";
        $this->emailService->reciever = $email;
        $this->emailService->sender = "noreply@winnersdurumi";
        $this->emailService->subject = "Winners Durumi Portal Invite";
        $this->emailService->title = "Winners Durumi";
        $this->emailService->receiverTitle = $name;
        $data = [
            "link" => "#",
            "name" => $name
        ];
        $this->emailService->data = $data;
        $this->emailService->sendEmail();
    }

    public function passwordReset($email, $name){
        $this->emailService->view = "email.admin_invite";
        $this->emailService->reciever = $email;
        $this->emailService->sender = "noreply@winnersdurumi";
        $this->emailService->subject = "Winners Durumi Portal Invite";
        $this->emailService->title = "Winners Durumi";
        $this->emailService->receiverTitle = $name;
        $data = [
            "link" => "#",
            "name" => $name
        ];
        $this->emailService->data = $data;

        $this->emailService->sendEmail();
    }

    public function testName(){
        $named = $this->emailService->aname = "Benjamin";
        dd($named);
    }
}