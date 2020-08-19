<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function adminLogin(){
        return view('admin.auth.login');
    }

    public function validateAdmin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $credentials = ['username' => $username, 'password' => $password];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        else {
            return back()->withErrors(['username' => 'Invalid credentials given'])->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
