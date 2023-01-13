<?php

namespace Crm\Customer\Services;

use Crm\Customer\Models\Customer;
use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Events\CustomerCreation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerService{

  public function index(){
    return Customer::all();
}

public function showById($id){
    return Customer::find($id);
}


public function create(CreateCustomer $request){
    $customer = new Customer();

    $customer->name = $request->get('name');
    $customer->save();

    event(new CustomerCreation($customer));
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