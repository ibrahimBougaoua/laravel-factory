<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PointOfSale;
use App\Models\Factory;
use App\Http\Requests\PointOfSaleRequest;

class PointOfSaleController extends Controller
{
    public function index()
    {
    	$pointsOfSales = PointOfSale::paginate(4);
    	return view('panel.pointofsale.index',compact('pointsOfSales'));
    }

    public function create()
    {
        $factories = Factory::all();
    	return view('panel.pointofsale.create',compact('factories'));
    }

    public function store(PointOfSaleRequest $request)
    {
    	try {
                $factory = Factory::find($request->factory);
                if( ! $factory )
                    return redirect()->route('pointofsale.index')->with(['error' => "this factory does't exists"]);

                $pointOfSale = PointOfSale::create([
	    			'name' => $request->name,
	    			'address' => $request->address,
	    			'factory_id' => $request->factory
	    		]);
	    		
                //Notification::send($pointofsale,new EmployeeCreated($pointofsale));
	    		return redirect()->route('pointofsale.index')->with(['success' => 'point of sale added successfully !']);
	    	
	    	return redirect()->route('pointofsale.index')->with(['error' => 'You must be already authenticated !']);
    	} catch (Exception $e) {
    		return redirect()->route('pointofsale.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show($id)
    {
    	try {
    		$pointOfSale = PointOfSale::find($id);
    		if ( ! $pointOfSale )
    			return redirect()->route('pointofsale.index')->with(['error' => "this point of sale does't exists"]);

    		return view('panel.pointofsale.show',compact('pointOfSale'));
    	} catch (Exception $e) {
    		return redirect()->route('pointofsale.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($id)
    {
    	try {
            $pointOfSale = PointOfSale::find($id);
            if ( ! $pointOfSale )
                return redirect()->route('pointofsale.index')->with(['error' => "this point of sale does't exists"]);

            $factories = Factory::all();

            return view('panel.pointofsale.edit',compact('pointOfSale','factories'));
        } catch (Exception $e) {
            return redirect()->route('pointofsale.edit')->with(['error' => 'some error']);
        }
    }

    public function update($id,PointOfSaleRequest $request)
    {
    	try {
           $pointOfSale = PointOfSale::find($id);
           
           if( ! $pointOfSale )
            return redirect()->route('pointofsale.index')->with(['error' => "this point of sale does't exists"]);

            PointOfSale::where('id',$id)->update(
                $request->except(['_token'])
            );

            return redirect()->route('pointofsale.index')->with(['success' => "point of sale updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('pointofsale.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($id)
    {
    	try {
    		$pointOfSale = PointOfSale::find($id);
    		
            if( ! $pointOfSale )
    			return redirect()->route('pointofsale.index')->with(['error' => "This point of sale does not exist"]);

            $pointOfSale->delete();
    		
            return redirect()->route('pointofsale.index')->with(['success' => 'point of sale delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('pointofsale.index')->with(['error' => "you can't delete this account"]);
    	}
    }
}
