<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        try {
            $category = Category::find($id);
            if ( ! $category )
                return redirect()->route('ui.product')->with(['error' => "this Product does't exists !"]);
            return view('ui.category.show',compact('category'));
        } catch (Exception $e) {
            return redirect()->route('ui.product')->with(['error' => "Somme error !"]);
        }
    }
}
