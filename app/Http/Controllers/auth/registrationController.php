<?php

namespace App\Http\Controllers\Auth;
use App\Models\registration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
            'email' => 'required|string|max:20',
            'password' => 'required|confirmed|min:6',
            'file' => 'required|mimes:png,jpg,jpeg'
        ]);


        registration::create([

            'userid' => $request->userid,
            'email'  => $request->email,
            'password' => Hash::make($request->password),
           
        ]);



        session()->flash('success', 'data create successfully');

        return redirect()->route('login');
    }

    public function login()
    {
        return view('components.login');
    }
    public function loginpost(Request $request)
   {
       $cradetial = [
         'email'=> $request->email,
         'password' => $request->password,
       ];


       if(Auth::attempt($cradetial))
       {
        session()->flash('success', 'login successfully');

        return redirect()->route('login');
       }else
        {
            session()->flash('success', 'email & password does not match');
    
            return redirect()->route('login');
       }
   
}
public function upload(Request  $request)
{
   echo   $request->file('file')->store('uploads');
} 


public function uploadFile(Request $request){

    if($request->hasFile('file')) { 
        $filename = time().'-ws'. $request->file('file')->getClientOriginalName();
        echo $request->file('file')->storeAs('public/upload',$filename);
        $location = 'uploads';

        // Move the file to the specified location with the custom filename
;

        session()->flash('message', 'Upload File Successfully');

        return redirect()->route('login');
    } else {
        session()->flash('message', 'File not uploaded.');
        return redirect('/');
    }
}


}
