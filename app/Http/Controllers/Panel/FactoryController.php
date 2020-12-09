<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Factory;
use App\Models\PointOfSale;
use App\Http\Requests\FactoryRequest;

class FactoryController extends Controller
{

    public function index()
    {
    	$factories = Factory::getOnlyMyFactories()->paginate(6);
    	return view('panel.factory.index',compact('factories'));
    }

    public function create()
    {
    	return view('panel.factory.create');
    }

    public function store(FactoryRequest $request)
    {
    	try {
    		if (Auth::check()) {

	    		$logo_path = "";
	    		if($request->has('logo'))
	    			$logo_path = upload_image('factory/',$request->photo);
	    		
                $factories = Factory::create([
	    			'name' => $request->name,
	    			'desc' => $request->desc,
	    			'phone' => $request->phone,
	    			'logo' => $logo_path,
	    			'employee_id' => Auth::id(),
	    		]);
	    		
                //Notification::send($factories,new EmployeeCreated($factories));
	    		return redirect()->route('factory.index')->with(['success' => 'Factory added successfully !']);
	    	}
	    	return redirect()->route('factory.index')->with(['error' => 'You must be already authenticated !']);
    	} catch (Exception $e) {
    		return redirect()->route('factory.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show($id)
    {
    	try {
    		$factory = Factory::find($id);
    		if ( ! $factory )
    			return redirect()->route('factory.index')->with(['error' => "this factory does't exists"]);

            if($factory->employee_id != Auth::id())
                return redirect()->route('factory.index')->with(['error' => "this factory does't exists"]);

    		return view('panel.factory.show',compact('factory'));
    	} catch (Exception $e) {
    		return redirect()->route('factory.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($id)
    {
    	try {
            $factory = Factory::find($id);
            if ( ! $factory )
                return redirect()->route('factory.index')->with(['error' => "this factory does't exists"]);

            if($factory->employee_id != Auth::id())
                return redirect()->route('factory.index')->with(['error' => "this factory does't exists"]);
            
            return view('panel.factory.edit',compact('factory'));
        } catch (Exception $e) {
            return redirect()->route('factory.edit')->with(['error' => 'some error']);
        }
    }

    public function update($id,FactoryRequest $request)
    {
    	try {
           $factory = Factory::find($id);
           
           if( ! $factory )
            return redirect()->route('factory.index')->with(['error' => "this factory does't exists"]);
           
           if($factory->employee_id != Auth::id())
            return redirect()->route('factory.index')->with(['error' => "this factory does't exists"]);

            if($request->has('logo'))
            {
                $logo_path = upload_image('factory/',$request->logo);
                Factory::where('id',$id)->update(['logo' => $logo_path]);
            }

            Factory::where('id',$id)->update(
                $request->except('_token','id','logo','password','repassword')
            );

            return redirect()->route('factory.index')->with(['success' => "factory updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('factory.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($id)
    {
    	try {
    		$factory = Factory::find($id);
    		
            if( ! $factory )
    			return redirect()->route('factory.index')->with(['error' => "This factory does not exist"]);

            if($factory->employee_id != Auth::id())
                return redirect()->route('factory.index')->with(['error' => "you can't delete this factory"]);
            
            $pointOfSale = $factory->getPointOfSales;

            if( isset($pointOfSale) && count($pointOfSale) > 0 )
                return redirect()->route('factory.index')->with(['error' => "you can't delete this factory"]);

            $factory->delete();
    		
            return redirect()->route('factory.index')->with(['success' => 'factory delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('factory.index')->with(['error' => "you can't delete this account"]);
    	}
    }
}
