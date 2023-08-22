<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\book;
use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\Rules\Unique;
use Nette\Utils\Strings;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return book::where('name','technology')
        ->where('price','13900')
        ->first();
        // return book::all();
        // return book::select('name','price','quality')->limit(5)->get();
        // return book::all()->where('quality','Bad');
        
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' =>  'required|string|max:40|unique:books',
            'price' =>  'required|string|max:15',
            'quality' => 'required|string',

          ]);
          
            book::create([
            'name' => $request->name,
            'price' => $request ->price,
            'quality' => $request->quality
         ]);

         if($request)
         {
            return "data create sucessfully";
         }else
         {
            return " Sorry ! data not enter database";
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
