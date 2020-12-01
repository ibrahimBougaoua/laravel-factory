<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PointOfSale;
use App\Models\Product;
use App\Models\Store;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function index()
    {
    	$stores = Store::getAllStores();
    	return view('panel.store.index',compact('stores'));
    }

    public function create()
    {
        $pointsOfSales = PointOfSale::all();
        $products = Product::all();
    	return view('panel.store.create',compact('pointsOfSales','products'));
    }

    public function store(StoreRequest $request)
    {
    	try {
    		if (Auth::check()) {

                $pointOfSale = PointOfSale::find($request->point_sale_id);
                if( ! $pointOfSale )
                    return redirect()->route('store.index')->with(['error' => "this point of sale does't exists"]);

                $product = Product::find($request->product_id);
                if( ! $product )
                    return redirect()->route('salesman.index')->with(['error' => "this product does't exists"]);

                $store = Store::create([
	    			'point_sale_id' => $request->point_sale_id,
	    			'product_id' => $request->product_id,
	    			'quantity_store' => $request->quantity_store,
	    			'quantity_sold' => $request->quantity_sold,
	    		]);
	    		
                //Notification::send($store,new EmployeeCreated($store));
	    		return redirect()->route('store.index')->with(['success' => 'Store added successfully !']);
	    	}
	    	return redirect()->route('store.index')->with(['error' => 'You must be already authenticated !']);
    	} catch (Exception $e) {
    		return redirect()->route('store.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show($point_sale_id,$product_id)
    {
    	try {
    		$store = Store::getStoreByIds($point_sale_id,$product_id);
    		if ( ! $store )
    			return redirect()->route('store.index')->with(['error' => "this store does't exists"]);

            $store = $store[0];
    		return view('panel.store.show',compact('store'));
    	} catch (Exception $e) {
    		return redirect()->route('store.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($point_sale_id,$product_id)
    {
    	try {
    		$store = Store::where([['point_sale_id','=',$point_sale_id],['product_id','=',$product_id]])->get();
    		
            if( ! $store )
    			return redirect()->route('store.index')->with(['error' => "This store does not exist"]);

    		$store = $store[0];
	        $pointsOfSales = PointOfSale::all();
	        $products = Product::all();

            return view('panel.store.edit',compact('store','pointsOfSales','products'));
        } catch (Exception $e) {
            return redirect()->route('store.index')->with(['error' => 'some error']);
        }
    }

    public function update($point_sale_id,$product_id,StoreRequest $request)
    {
    	try {
    		$store = Store::where([['point_sale_id','=',$point_sale_id],['product_id','=',$product_id]])->get();
    		
            if( ! $store )
    			return redirect()->route('store.index')->with(['error' => "This store does not exist"]);
    		
            $store->update(
                $request->except(['_token'])
            );

            return redirect()->route('store.index')->with(['success' => "Store updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('store.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($point_sale_id,$product_id)
    {
    	try {
    		$store = Store::where([
    			['point_sale_id', '=', $point_sale_id],
    			['product_id', '=', $product_id]
    		]);
    		
            if( ! $store )
    			return redirect()->route('store.index')->with(['error' => "This store does not exist"]);

            $store->delete();
    		
            return redirect()->route('store.index')->with(['success' => 'store delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('store.index')->with(['error' => "you can't delete this store"]);
    	}
    }
}
