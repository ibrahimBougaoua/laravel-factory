<?php

namespace App\Http\Controllers\Ui\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\models\Ui\Customer;
use Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {

       return view('ui.auth.password.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $customer = Customer::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect()->route('ui.get.login')->with(['success' => 'Your password has been changed!']);

    }
}
