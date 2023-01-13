<?php

namespace App\Http\Controllers;

use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerService $customerSerive)
    {   
    }

    public function index(){
        return $this->customerSerive->index();
    }

    public function showById($id){
        return $this->customerSerive->showById($id);
    }


    public function create(CreateCustomer $request){
      
        return $this->customerSerive->create($request);
    }



    public function update(Request $request, $id){
      
        return $this->customerSerive->update($request, $id);
    }

    public function delete(Request $request, $id){

        return $this->customerSerive->delete($request, $id);

    }
    

}
