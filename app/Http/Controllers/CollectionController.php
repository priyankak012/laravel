<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\employee;

use Illuminate\Http\Request;

class CollectionController extends Controller
{








    public function collection()
    {



    //     $employee = employee::get();
    //     $result = $employee->map(function($employee)
    //     {
    //         return  $employee->name;
    //     });
    //     dd($result);


    // //  $user = User::get();
    // //  $result = $user->map(function($user)
    // //  {
    // //       return $user->password;

    // //  });
    // //   dd($result);

        $item = collect([
            ['name' => 'mobile','price'=> 1000,'sales'=> 200],
            ['name' => 'tv','price'=> 23000,'sales'=> 2300],
            ['name' => 'fridge','price'=> 14000,'sales'=> 2600],
            ['name' => 'oppo_mobile','price'=> 16000,'sales'=> 3200],
            ['name' => 'fridge','price'=> 17000,'sales'=> 5200],
            ['name' => 'washmachine','price'=> 14000,'sales'=> 200],
            ['name' => 'fridge','price'=> 43000,'sales'=> 2300],
            ['name' => 'Lg_tv','price'=> 34000,'sales'=> 2600],
            ['name' => 'tv','price'=> 26000,'sales'=> 3200],
            ['name' => 'Ac','price'=> 80000,'sales'=> 5200],
            ['name' => 'fridge','price'=> 43000,'sales'=> 2300],
            ['name' => 'Lg_tv','price'=> 34000,'sales'=> 2600],
            ['name' => 'tv','price'=> 26000,'sales'=> 3200],
            ['name' => 'Ac','price'=> 80000,'sales'=> 5200]
            
        ]);

        
      $result = $item->where('sales','>',4000);
    //   $count = $item->max('price');
        // $item->all();
         dd($result);


    $require = $item->collapse();
     dd($item);
        
  return collect([2,3,4,5,6,7,])->sum();

    
    }
}
