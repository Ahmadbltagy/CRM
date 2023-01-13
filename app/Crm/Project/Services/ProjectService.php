<?php 

namespace Crm\Project\Services;

use Crm\Project\Events\ProjectCreation ;
use Crm\Project\Models\Project;
use Crm\Project\Requests\CreateProject;

class ProjectService{


  public function index(){
    return Project::all();
  }
  public function create(CreateProject $request, $customerId){
    $project = new Project();
    $project->project_name = $request->project_name;
    $project->status = (bool) $request->status;
    $project->customer_id = (int) $customerId;
    $project->project_cost = (int) $request->project_cost;
    
    event(new ProjectCreation($project));
    $project->save();

    return $project;
  }  
}