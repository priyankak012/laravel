<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class IndexController extends Controller
{
    public function create()
    {
         return view('components.home');
    }

    
}
