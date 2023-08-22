<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\Products;
use App\Models\registration;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Employee::all();
    }


    public function store(Request $request)
    {
         $products = new Products;
          $products->name = $request->name;
          $products->author = $request->author;
          $products->publish_date= $request->publish_date;
           $products->save();

           return  response()->json(['message' => "product Added"]);

    }

    public function  show($id)
    {
       $products = Products::find($id);
       if(!empty ($products))
       {
         return response()->json($products);
       }
       else
       {
        return response()->json(['message' => "product not Found"]);
       }
    }

        public function destroy($id)
        {
            if(Products::where('id',$id)->exists())
            {
                $products = Products::find($id);
                $products->delete();

                return response()->json([
                    "message" => "records deleted"
                ],202);

            }

            else
            {
                return response()->json(["message" => "product not delete"]);
            }
        }
    }

