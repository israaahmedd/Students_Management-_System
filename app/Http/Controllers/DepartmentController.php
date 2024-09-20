<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::get();
    
        return view('layout.dept',compact('departments'));

    }
    public function show($id){
    
    
    $department= Department::findOrFail($id);
    $students = Department::get();
  
    return view('layout.dept-show', compact('students','department'));



    }
    
}
