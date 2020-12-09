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
    	$employees = Admin::exceptSelf()->paginate(4);
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
	    			$photo_path = upload_image('profile/',$request->photo);
	    		
                $employee = Admin::create([
	    			'first_name' => $request->first_name,
	    			'last_name' => $request->last_name,
	    			'email' => $request->email,
	    			'password' => $request->password,
	    			'phone' => $request->phone,
	    			'city' => $request->city,
	    			'address' => $request->address,
	    			'photo' => $photo_path,
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

    public function show($id)
    {
    	try {
    		$employee = Admin::with('getPointOfSales')->find($id);

    		if ( ! $employee )
    			return redirect()->route('employee.index')->with(['error' => "this employee does't exists"]);

            if($employee->manage_id != Auth::id())
                return redirect()->route('employee.index')->with(['error' => "this employee does't exists"]);

    		return view('panel.employee.show',compact('employee'));
    	} catch (Exception $e) {
    		return redirect()->route('employee.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($id)
    {
    	try {
            $employee = Admin::find($id);
            if ( ! $employee )
                return redirect()->route('employee.index')->with(['error' => "this employee does't exists"]);

            if($employee->manage_id != Auth::id() && $id != Auth::id())
                return redirect()->route('employee.index')->with(['error' => "this employee does't exists"]);
            
            return view('panel.employee.edit',compact('employee'));
        } catch (Exception $e) {
            return redirect()->route('employee.edit')->with(['error' => 'some error']);
        }
    }

    public function update($id,EmployeeRequest $request)
    {
    	try {
           $employee = Admin::find($id);
           
           if( ! $employee )
            return redirect()->route('employee.index')->with(['error' => "this employee does't exists"]);
           
           if($employee->manage_id != Auth::id())
            return redirect()->route('employee.index')->with(['error' => "this employee does't exists"]);

            if($request->has('photo'))
            {
                $photo_path = upload_image('profile/',$request->photo);
                Admin::where('id',$id)->update(['photo' => $photo_path]);
            }

            $dataExcept = $request->except('_token','id','photo','password','repassword');

            //if($request->has('password'))
              //  $dataExcept['password'] = $request->password;

            //return $dataExcept;

            Admin::where('id',$id)->update(
                $dataExcept
            );

            return redirect()->route('employee.index')->with(['success' => "employee updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('employee.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($id)
    {
    	try {
    		$employee = Admin::find($id);
    		
            if( ! $employee )
    			return redirect()->route('employee.index')->with(['error' => "This employee does not exist"]);

            if ($id == Auth::id())
                return redirect()->route('employee.index')->with(['error' => "you can't delete you'r account"]);
            
            if($employee->manage_id != Auth::id())
                return redirect()->route('employee.index')->with(['error' => "you can't delete this account"]);

            $salesmen = $employee->getPointOfSales();

            if( isset($salesmen) && $salesmen->count() > 0 )
                return redirect()->route('employee.index')->with(['error' => "you can't delete this account"]);

            $employee->delete();
    		
            return redirect()->route('employee.index')->with(['success' => 'Employee delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('employee.index')->with(['error' => "you can't delete this account"]);
    	}
    }
}
