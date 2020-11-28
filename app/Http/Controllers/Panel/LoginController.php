<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function checkLogin()
    {
    	if (auth()->guard('admin')->attempt(['email' => $request->input('email'),'email' => $request->input('password'),$remembre_me])) {
    		return redirect()->route('panel.dashboard.dashboard');
    	}
    	return redirect()->back()->with(['error' => 'error login']);
    }

    public function login()
    {
    	return view('panel.auth.login');
    }
}
