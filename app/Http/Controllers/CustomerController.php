<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function index(){
        return Customer::all();
    }

    public function showById($id){
        return Customer::find($id) ?? response()->json(["Status"=>"Not founded"], Response::HTTP_NOT_FOUND);
    }


    public function create(Request $request){
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->save();
        return $request;
    }



    public function update(Request $request, $id){
        $customer = Customer::find($id);
        
        if(!$customer){
            return response()->json(['status'=>"Not founded"], 404);
        }
        $customer->name = $request->name;
        $customer->save();
        return response()->json(["Status"=>"Updated Successfully"], Response::HTTP_OK);
    }

    public function delete(Request $request, $id){
        $customer = Customer::findOrFail($id);
        
        if(!$customer){
            return response()->json(['status'=>"Not founded"], Response::HTTP_NOT_FOUND);
        }
        $customer->delete();
        return response()->json(["Status"=>"Deleted Successfully"], Response::HTTP_OK);

    }
    

}
