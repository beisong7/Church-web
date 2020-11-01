<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LFMHelper
{
    public function userField()
    {
        return Auth::user()->uuid;
    }
}
