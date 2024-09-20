<?php

namespace App\Http\Controllers;


use App\Models\Department;
use Illuminate\Http\Request;
// use App\Http\Controllers\student;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use App\Notifications\UserNotification;

use Illuminate\Support\Facades\Notification;


class StudentController extends Controller
{


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Student::get();

        return view('layout.index', compact('data'));  
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();
        return view('layout.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */ // Ensure you have the Student model imported at the top

    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();
     
        $student = new Student();
        $student->ssn = $request->ssn;
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->dept_id = $request->department;  // Make sure this line is included
    
        if ($request->hasFile('img')) {
            $imageName =  time().'.'.$request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $student->img = $imageName;  // Assuming you have an 'imgs' column in your students table
        }
    
        $student->save();
      
      
        return redirect()->back()->with('msg', 'Added successflly');

    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
   
        $data = Student::findOrFail($id);
        $departments = Department::get();

        return view('layout.show', compact('data','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ssn)
    {

        $student = Student::findOrFail($ssn);
        $departments = Department::get();
        return view('layout.edit', compact('student', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, string $ssn)
    {
        $student = Student::findOrFail($ssn);
    
        // Prepare data for updating
        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'dept_id' => $request->department,
        ];
    
      
        // Update student record
        $student->update($data);
    
        return redirect()->route('index')->with('success', 'Student updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ssn)
    {
        // dd($ssn);
       $student = Student::where('ssn',$ssn )->findOrFail($ssn);
        $student->delete();
        return redirect()->route('index')->with('success', 'Student updated successfully!');

    }
    public function archive()
    {
   $data=Student::onlyTrashed()->get();
       
        return view('layout.soft-delete',compact('data'));
    }
    public function forceDelete($id)
    {

        $student = Student::withTrashed()->findOrFail($id);
        $student->forceDelete();
        return redirect()->back()->with('success', 'Student permanently deleted successfully');
    }

    public function restore($id)

    {
        
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();

        return redirect()->back()->with('success', 'Student restored successfully!');
    }
  
}
