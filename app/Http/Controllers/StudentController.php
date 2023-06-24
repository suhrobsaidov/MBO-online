<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Student $students)
    {
        $students = Student::all();
        return view('students.student');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $students = new Student;

        $students->name = $request->input('username');
        $students->phone = $request->input('phone');
        $students->password = $request->input('password');
        $students->days = $request->input('days');
        $students->level = $request->input('level');
        $students->time = $request->input('time');
        $students->birthdate = $request->input('birthdate');

        $students->save();




        return redirect('/students.student')->with('status','Data Added for Users');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $students, $id)
    {
        $students = Student::findOrFail($id);
        return view('students.student-edit')->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $students, $id)
    {
        $students = Student::find($id);
        $students->name = $request->input('username');
        $students->surname = $request->input('surname');
        $students->phone = $request->input('phone');
        $students->days = $request->input('days');
        $students->level = $request->input('level');
        $students->time = $request->input('time');
        $students->birthdate = $request->input('birthdate');
        $students->update();

        return redirect('/studetns.student')->with('status' , 'Your Data is Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
