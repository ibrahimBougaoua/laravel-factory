<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::getOnlyMyCategories()->paginate(1);
    	return view('panel.category.index',compact('categories'));
    }

    public function create()
    {   
    	$categories = Category::getOnlyMyCategories()->get();
    	return view('panel.category.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
    	try {
    		if (Auth::check()) {
                
                $subcate_id = $request->subcateid;
    			if ( ! Category::find($subcate_id) )
    				$subcate_id = 0;

	    		//$photo_path = "";
	    		//if($request->has('photo'))
	    		//	$photo_path = upload_image('category/',$request->photo);
	    		
                $category = Category::create([
	    			'name' => $request->name,
	    			'slug' => $request->slug,
	    			'description' => $request->description,
	    		//	'photo' => $photo_path,
	    			'subcateid' => $subcate_id,
	    			'employee_id' => Auth::id(),
	    		]);
	    		
                //Notification::send($category,new EmployeeCreated($category));
	    		return redirect()->route('category.index')->with(['success' => 'Category added successfully !']);
	    	}
	    	return redirect()->route('category.index')->with(['error' => 'You must be already authenticated !']);
    	} catch (Exception $e) {
    		return redirect()->route('category.index')->with(['error' => 'You have an error !']);
    	}
    }

    public function show($id)
    {
    	try {
    		$category = Category::find($id);
    		if ( ! $category )
    			return redirect()->route('category.index')->with(['error' => "this category does't exists"]);

            if($category->employee_id != Auth::id())
                return redirect()->route('category.index')->with(['error' => "this category does't exists"]);

    		return view('panel.category.show',compact('category'));
    	} catch (Exception $e) {
    		return redirect()->route('category.show')->with(['error' => 'some error']);
    	}
    }

    public function edit($id)
    {
    	try {
            $category = Category::find($id);
            if ( ! $category )
                return redirect()->route('category.index')->with(['error' => "this category does't exists"]);

            if($category->employee_id != Auth::id())
                return redirect()->route('category.index')->with(['error' => "this category does't exists"]);
            
    	    $categories = Category::getOnlyMyCategories()->get();
            return view('panel.category.edit',compact('category','categories'));
        } catch (Exception $e) {
            return redirect()->route('category.edit')->with(['error' => 'some error']);
        }
    }

    public function update($id,CategoryRequest $request)
    {
    	try {
           $category = Category::find($id);
           
           if( ! $category )
            return redirect()->route('category.index')->with(['error' => "this category does't exists"]);
           
           if($category->employee_id != Auth::id())
            return redirect()->route('category.index')->with(['error' => "this category does't exists"]);

            if($request->has('photo'))
            {
                $photo_path = upload_image('category/',$request->photo);
                Category::where('id',$id)->update(['photo' => $photo_path]);
            }

            Category::where('id',$id)->update(
                $request->except(['_token'])
            );

            return redirect()->route('category.index')->with(['success' => "category updated successfully"]);

        } catch (Exception $e) {
            return redirect()->route('category.index')->with(['error' => "some error"]);
        }
    }

    public function destroy($id)
    {
    	try {
    		$category = Category::find($id);
    		
            if( ! $category )
    			return redirect()->route('category.index')->with(['error' => "This category does not exist"]);

            if ($id == Auth::id())
                return redirect()->route('category.index')->with(['error' => "you can't delete you'r account"]);
            
            if($category->employee_id != Auth::id())
                return redirect()->route('category.index')->with(['error' => "you can't delete this account"]);

            $category->delete();
    		
            return redirect()->route('category.index')->with(['success' => 'category delete successfully']);
    	} catch (Exception $e) {
    		return redirect()->route('category.index')->with(['error' => "you can't delete this account"]);
    	}
    }
}
