<?php

namespace App\Http\Controllers;

use Crm\Customer\Services\CustomerService;
use Crm\Project\Requests\CreateProject;
use Crm\Project\Services\ProjectService;
use Illuminate\Http\Response;

class ProjectController extends Controller{

  public function __construct(private ProjectService $projectService, private CustomerService $customerService)
  {  
  }

  public function index(){
    return $this->projectService->index();
  }

  public function create(CreateProject $request, $customerId){
    $customer = $this->customerService->showById($customerId);
    if(!$customer){
      return response()->json(['status'=>'Not founded'], Response::HTTP_BAD_REQUEST);
    }
    return $this->projectService->create($request, $customerId);
  }

}