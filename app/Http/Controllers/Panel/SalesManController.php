<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SalesManRequest;
use App\Models\PointOfSale;
use App\Models\Admin;
use App\Models\SalesMan;

class SalesManController extends Controller
{
    public function index()
    {
    	$salesmen = SalesMan::getSalesMen();
    	return view('panel.salesman.index',compact('salesmen'));
    }

    public function create()
    {
        $pointsOfSales = PointOfSale::all();
        $employees = Admin::all();
    	return view('panel.salesman.create',compact('pointsOfSales','employees'));
    }

    public function store(SalesManRequest $request)
    {
    	try {
    		if (Auth::check()) {

                $pointOfSale = PointOfSale::find($request->pointofsale_id);
                if( ! $pointOfSale )
                    return redirect()->route('salesman.index')->with(['error' => "this point of sale does't exists"]);

                $employee = Admin::find($request->employee_id);
                if( ! $employee )
                    return redirect()->route('salesman.index')->with(['error' => "this employee does't exists"]);

                $SalesMan = SalesMan::create([
	    			'manage_id' => Auth::id(),
	    			'employee_id' => $request->employee_id,
	    			'point_sale_id' => $request->pointofsale_id
	    		]);
	    		
                //Notification::send($SalesMan,new EmployeeCreated($SalesMan));
	    		return redirect()->route('salesman.index')->with(['success' => 'Sales Man added successfully !']);
	    	}
	    	return redirect()->route('salesman.index')->with(['error' => 'You must be already authenticated !']);
    	} catch (Exception $e) {
    		return redirect()->route('salesman.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show($id)
    {
    	try {
    		$salesMan = SalesMan::getSalesManById($id);
    		if ( ! $salesMan )
    			return redirect()->route('salesman.index')->with(['error' => "this point of sale does't exists"]);

    		return view('panel.salesman.show',compact('salesMan'));
    	} catch (Exception $e) {
    		return redirect()->route('salesman.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($id)
    {
    	try {
    		$salesMan = SalesMan::find($id);
    		
            if( ! $salesMan )
    			return redirect()->route('salesman.index')->with(['error' => "This sales man does not exist"]);

            $pointsOfSales = PointOfSale::all();
            $employees = Admin::all();

            return view('panel.salesman.edit',compact('pointsOfSales','employees','salesMan'));
        } catch (Exception $e) {
            return redirect()->route('salesman.edit')->with(['error' => 'some error']);
        }
    }

    public function update($id,SalesManRequest $request)
    {
    	try {
            $salesMan = SalesMan::find($id);
    		
            if( ! $salesMan )
    			return redirect()->route('salesman.index')->with(['error' => "This sales man does not exist"]);

            $salesMan->update(
                $request->except(['_token'])
            );

            return redirect()->route('salesman.index')->with(['success' => "sales man updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('salesman.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($id)
    {
    	try {
    		$salesMan = SalesMan::find($id);
    		
            if( ! $salesMan )
    			return redirect()->route('salesman.index')->with(['error' => "This sales man does not exist"]);

            $salesMan->delete();
    		
            return redirect()->route('salesman.index')->with(['success' => 'sales man delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('salesman.index')->with(['error' => "you can't delete this account"]);
    	}
    }
}
