<?php

namespace App\Traits\Email;

use App\Services\EmailServices;

trait MailCart{

    protected $emailService;

    public function __construct(EmailServices $services)
    {
        $this->emailService = $services;
    }

    public function prepAdminInvite($email, $name, $token=null, $role_name = null){
        $this->emailService->view = "email.admin_invite";
        $this->emailService->reciever = $email;
        $this->emailService->sender = "noreply@winnersdurumi.org";
        $this->emailService->subject = "Winners Durumi Portal Invite";
        $this->emailService->title = "Winners Durumi";
        $this->emailService->receiverTitle = $name;
        $data = [
            "link" => !empty($token)?route('admin.accept.invite', $token):"#",
            "name" => $name,
            "role" => !empty($role_name)?$role_name:null
        ];
        $this->emailService->data = $data;
        $this->emailService->sendEmail();
    }

    public function adminNewRole($email, $name, $role){
        $this->emailService->view = "email.admin_new_role";
        $this->emailService->reciever = $email;
        $this->emailService->sender = "noreply@winnersdurumi";
        $this->emailService->subject = "New Role | Winners Durumi Portal";
        $this->emailService->title = "Winners Durumi";
        $this->emailService->receiverTitle = $name;
        $data = [
            "name" => $name,
            "role" => $role
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
}