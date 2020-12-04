<?php

namespace App\Http\Controllers\Ui;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Ui\LoginRequest;
use App\Models\Ui\Customer;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function checkLogin(LoginRequest $request)
    {
        $remembre_me = $request->has('remembre_me') ? true : false;
    	if (auth()->guard('customer')->attempt(['email' => $request->input("email"),'password' => $request->input("password")],$remembre_me)) {
    		return redirect()->route('ui.dashbaord');
    	}
    	return redirect()->back()->with(['error' => 'error login']);
    }

    public function getLogin()
    {
        return view('ui.auth.login');
    }

    public function logOut()
    {
        Auth::logout();
        return view('ui.auth.login');
    }
}
