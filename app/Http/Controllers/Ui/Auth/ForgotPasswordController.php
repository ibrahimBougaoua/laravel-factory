<?php

namespace App\Http\Controllers\Ui\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

       return view('ui.auth.password.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('ui.auth.password.verify',['token' => $token], function($message) use ($request) {
                  $message->from('bb.team.bouagaoua@gmail.com');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });
        return redirect()->route('ui.customer.getEmail')->with(['success' => 'We have e-mailed your password reset link!']);
    }
}
