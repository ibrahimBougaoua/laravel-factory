<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ui\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Ui\Customer;

class CustomerController extends Controller
{
    public function signup()
    {
        return view('ui.signup.signup');
    }

    public function store(CustomerRequest $request)
    {
    	//return $request->except('_token','first_name');
    	try {
                $customer = Customer::create($request->except('_token'));
	    		
                //Notification::send($employee,new EmployeeCreated($employee));
	    		return redirect()->route('ui.get.login')->with(['success' => "You'r account has been created !"]);
    	} catch (Exception $e) {
    		return redirect()->route('ui.signup')->with(['error' => 'You have an error !']);
    	}
    }

    public function profile()
    {
    	$customer = Customer::find(Auth::guard('customer')->user()->id);
    	return view('ui.profile.profile',compact('customer'));
    }

    public function update(CustomerRequest $request)
    {
    	try {
           $customer = Customer::find(Auth::guard('customer')->user()->id);
           
            if($request->has('photo'))
            {
                $photo_path = upload_image('profile/',$request->photo);
                Customer::where('id',Auth::id())->update(['photo' => $photo_path]);
            }

            $requests = $request->except(['_token','id','photo','password']);

            if($request->has('password'))
                $requests['password'] = $request->password;

            Customer::where('id',Auth::guard('customer')->user()->id)->update(
                $requests
            );

            return redirect()->route('ui.profile')->with(['success' => "Profile updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('ui.profile')->with(['error' => "some error"]);
        }
    }

    public function changePhoto(Request $request)
    {
    	try {
           $customer = Customer::find(Auth::guard('customer')->user()->id);
           
            if($request->has('photo'))
            {
                $photo_path = upload_image('customer/',$request->photo);
                Customer::where('id',Auth::id())->update(['photo' => $photo_path]);
            }

            return redirect()->route('ui.profile')->with(['success' => "Profile updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('ui.profile')->with(['error' => "some error"]);
        }
    }

    public function logOut()
    {
        Auth::logout();
        return view('ui.auth.login');
    }
}
