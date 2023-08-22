<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Employee as ModelsEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class ApiemployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ModelsEmployee::all();
    }


    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = ModelsEmployee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return [
            "status" => 1,
            "employee" => $employee,
            "message" => "employee created successfully"
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $employee = Employee::findOrFail($id);
        
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $id,
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ]);

    $employee->update($validatedData);

        
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return [
            "status" => 1,
            "employee" => $employee,
            "message" => "Employee updated successfully"
        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelsEmployee::findOrFail($id)->delete();
        return [
           
            "message"=> "data delete sucessfully"
           
        ];

}
}
