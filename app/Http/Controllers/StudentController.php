<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('welcome', compact('students'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
           'firstname' => 'required',
           'lastname' => 'required',
           'email' => 'required',
           'phone' => 'required',
        ]);
        $student = new Student();
        $student->first_name = $request->input('firstname');
        $student->last_name = $request->input('lastname');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();

        return redirect()->route('home')->with('success_mesage', 'Student Succsusfully Added');
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $student = Student::find($id);
        $student->first_name = $request->input('firstname');
        $student->last_name = $request->input('lastname');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();

        return redirect()->route('home')->with('success_mesage2', 'Student Succsusfully Updated');
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('home')->with('success_mesage3', 'Student Succsusfully Deleted');
    }
}
