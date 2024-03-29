<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Students::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lname'     => 'required',
            'fname'     => 'required',
            'phone'     => 'required',
            'gender'    => 'required',
            'course'    => 'required',
            'year'      => 'required'
        ]);

        return Students::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        return Students::with('borrows')->where('students.id', $student->id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student)
    {
        $student = Students::find($student->id);
        $student->update($request->all());
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        return Students::destroy($student->id);
    }
}

