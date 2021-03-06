<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Admin;
use App\Http\Requests\ProductRequest;
use Stripe;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(4);
    	return view('panel.product.index',compact('products'));
    }

    public function create()
    {
    	$categories = Category::getOnlyMyCategories()->get();
    	return view('panel.product.create',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
    	try {
                $products = Product::create([
	    			'name' => $request->name,
	    			'description' => $request->description,
	    			'quantity_unit' => $request->quantity_unit,
	    			'unit_price' => $request->unit_price,
	    			'size' => $request->size,
	    			'color' => $request->color,
	    			'note' => $request->note,
	    			'cateid' => $request->cateid,
	    		]);
	    		
                //Notification::send($factories,new EmployeeCreated($factories));
	    		return redirect()->route('product.index')->with(['success' => 'product added successfully !']);
    	} catch (Exception $e) {
    		return redirect()->route('product.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show($id)
    {
    	try {
    		$product = Product::find($id);
    		if ( ! $product )
    			return redirect()->route('product.index')->with(['error' => "this product does't exists"]);

    		return view('panel.product.show',compact('product'));
    	} catch (Exception $e) {
    		return redirect()->route('product.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($id)
    {
    	try {
            $product = Product::find($id);
            if ( ! $product )
                return redirect()->route('product.index')->with(['error' => "this product does't exists"]);

    	    $categories = Category::getOnlyMyCategories()->get();
            return view('panel.product.edit',compact('product','categories'));
        } catch (Exception $e) {
            return redirect()->route('product.edit')->with(['error' => 'some error']);
        }
    }

    public function update($id,ProductRequest $request)
    {
    	try {
           $product = Product::find($id);
           
           if( ! $product )
            return redirect()->route('product.index')->with(['error' => "this product does't exists"]);

            Product::where('id',$id)->update(
                $request->except(['_token'])
            );

            return redirect()->route('product.index')->with(['success' => "product updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('product.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($id)
    {
    	try {
    		$product = Product::find($id);
    		
            if( ! $product )
    			return redirect()->route('product.index')->with(['error' => "This product does not exist"]);

            $product->delete();
    		
            return redirect()->route('product.index')->with(['success' => 'product delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('product.index')->with(['error' => "you can't delete this product"]);
    	}
    }

}
