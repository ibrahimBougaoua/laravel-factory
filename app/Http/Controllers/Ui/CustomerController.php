<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ui\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Ui\Customer;

class CustomerController extends Controller
{
    public function profile()
    {
    	$customer = Customer::find(Auth::id());
    	return view('ui.profile.profile',compact('customer'));
    }

    public function update(CustomerRequest $request)
    {
    	try {
           $customer = Customer::find(Auth::id());
           
            if($request->has('photo'))
            {
                $photo_path = upload_image('profile/',$request->photo);
                Customer::where('id',Auth::id())->update(['photo' => $photo_path]);
            }

            $dataExcept = $request->except('_token','id','photo','password');

            //if($request->has('password'))
              //  $dataExcept['password'] = $request->password;

            //return $dataExcept;

            Customer::where('id',$id)->update(
                $dataExcept
            );

            return redirect()->route('ui.profile')->with(['success' => "Customer updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('ui.profile')->with(['error' => "some error"]);
        }
    }

}
