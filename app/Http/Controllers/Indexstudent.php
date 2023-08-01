<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Indexstudent extends Controller
{

    public function index()
    {
        $posts = Student::latest()->paginate(5);
        return view('crud.view')->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'address' => $request->address,
            'fees' => $request->fees,
        ]);

        // return redirect()->route('crud.view')->with('success','Product created successfully.');
    }

    public function view()
    {
        return view('crud.view', [
            'students' => Student::all()
        ]);
    }
}



