<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class EmployeeController extends Controller
{
    public function index()
    {
    	$employees = Admin::all();
    	return view('panel.employee.index',compact('employees'));
    }

    public function create()
    {
    	return 'create';
    }

    public function edit()
    {
    	return 'edit';
    }

    public function store()
    {
    	return 'store';
    }

    public function show()
    {
    	return 'show';
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
