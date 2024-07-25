<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('Student.index',compact('students'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'dep' => 'required',
    ]);

    //create student in db
    $student = Student::create([
        'First_name' => $request->first_name,
        'Last_name' => $request->last_name,
        'Department' => $request->dep,
    ]);


    //redirect
    return redirect()->route('Student.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
    return view('Student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentId)
    {
        $student = Student::findOrFail($studentId);

    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'dep' => 'required',
    ]);

    $student->update([
        'First_name' => $request->first_name,
        'Last_name' => $request->last_name,
        'Department' => $request->dep,
    ]);

    return redirect()->route('Student.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('Student.index')->with('success', 'Student deleted successfully');
    }
}
