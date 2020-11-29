<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;

class LoginController extends Controller
{
    public function checkLogin(LoginRequest $request)
    {
        $remembre_me = $request->has('remembre_me') ? true : false;
    	if (auth()->guard('admin')->attempt(['email' => $request->input("email"),'password' => $request->input("password")],$remembre_me)) {
    		return redirect()->route('panel.dashboard');
    	}
    	return redirect()->back()->with(['error' => 'error login']);
    }

    public function getLogin()
    {
        return view('panel.auth.login');
    }

    public function logOut()
    {
        Auth::logout();
        return view('panel.auth.login');
    }
}
