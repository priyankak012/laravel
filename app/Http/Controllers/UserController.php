<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    

    public function index()
    {
    //    return User::all();

        //   return DB::table('users')->select('email','name');
        //   return DB::table('users')->pluck('email','name');
        DB::table('users')->select('id','name','password')->orderBy('id')->chunk(50, function (Collection $users) {
            foreach ($users as $user) 
            {
                dd($users);  } 
             });

        //   return DB::table('users')->count();
        //   return DB::table('users')->min('id');
            //  return DB::table('users')->sum('id');
              
            // $query = DB::table('users')->select('name');
 
            //  $users = $query->addSelect('email')->get();

            //  dd($users);

            // $users = DB::table('users')
            // ->select('name', 'email')
            // ->groupByRaw('name, email')
            // ->get();


            // dd($users);

            // return DB::table('users')->select('name','password')->get();
            // return DB::table('users')->select('id','name');
    

            

    }



    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|max:20',
            'email' => 'required',
            'password' => 'required|confirmed|max:6',

        ]);
          
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => encrypt($request->password),
        ]);
        
    }
}
