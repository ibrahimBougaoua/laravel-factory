<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmployeeCreated;

class EmployeeController extends Controller
{
    public function index()
    {
    	$employees = Admin::all();
    	return view('panel.employee.index',compact('employees'));
    }

    public function create()
    {
    	return view('panel.employee.create');
    }

    public function store(EmployeeRequest $request)
    {
    	try {
    		if (Auth::check()) {
	    		$photo_path = "";
	    		if($request->has('photo'))
	    			$photo_path = upload_image('profile',$request->photo);
	    		$employee = Admin::create([
	    			'first_name' => $request->first_name,
	    			'last_name' => $request->last_name,
	    			'email' => $request->email,
	    			'password' => $request->password,
	    			'phone' => $request->phone,
	    			'city' => $request->city,
	    			'address' => $request->address,
	    			'photo' => $request->photo_path,
	    			'manage_id' => Auth::id(),
	    		]);
	    		Notification::send($employee,new EmployeeCreated($employee));
	    		return redirect()->route('employee.index')->with(['success' => 'Employee added successfully !']);
	    	}
	    	return redirect()->route('employee.index')->with(['error' => 'You must be already authenticated !']);
    	} catch (Exception $e) {
    		return redirect()->route('employee.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show()
    {
    	return 'show';
    }

    public function edit()
    {
    	return 'edit';
    }

    public function update()
    {
    	return 'update';
    }

    public function destroy()
    {
    	return 'destroy';
    }
}
