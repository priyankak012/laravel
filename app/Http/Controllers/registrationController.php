<?php

namespace App\Http\Controllers;

use App\Models\registration;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registrationController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest')->except([
            'logout', 'dashboar'
        ]);
    }

    public function create()
    {
        return view('components.registration');
    }

    public function store(Request $request)
    {

        $request->validate([
            'userid' => 'required|string|max:20',
            'email' => 'required|string|max:20|unique:registrations',
            'password' => 'required|confirmed|min:6',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);


        registration::create([

            'userid' => $request->userid,
            'email'  => $request->email,
            'password' => Hash::make($request->password),
            'file' =>  $request->file->store('uploads'),

        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('authentication')
            ->withSuccess('You have successfully registered!');


        // session()->flash('success', 'Your registration successfully');

        // return redirect()->route('login');
    }

    public function login()
    {
   
        return view('components.login');
     }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {

            dd('thayu');
            // return redirect()->route('')->withSuccess('You have successfully logged in.');
        }
        dd('na thayu'); 
        // return redirect()->route('dashboard')->withErrors('Invalid credentials. Please try again.');
    }



    public function dashboard()
    {
        if (Auth::check()) {
            return view('components.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

}
