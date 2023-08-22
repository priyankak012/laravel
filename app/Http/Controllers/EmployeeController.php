<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('components.home');
    }

    public function index()
    {
        return view('components.input', [
            'Employees' => Employee::all()
        ]);
    }

    public function add()
    {

        return Employee::all();
        //    return Employee::table('employees') ->select('name','email')->get();

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:30',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:30',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        session()->flash('success', 'data create successfully');

        return redirect()->route('edit');
    }


    public  function edit($id)
    {

        $employee = Employee::where('id', $id)->first();
        return view('components.edit', ['employee' => $employee]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:25',
        ]);


        $employee = Employee::findOrFail($id);
        $employee->update($request->all());


        session()->flash('update', 'Data Update Successfully');


        return redirect()->route('edit');
    }

    //     return redirect()->route('EDIT')->with('success', 'Employee updated successfully.');
    // 

    public function destroy($id)
    {

        $employee = Employee::where('id', $id)->first();
        $employee->delete();

        session()->flash('delete', 'Data Delete Successfully');


        return redirect()->route('edit');
    }

}
