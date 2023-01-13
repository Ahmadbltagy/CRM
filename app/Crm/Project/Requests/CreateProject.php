<?php

namespace Crm\Project\Requests;

use Crm\Base\Requests\ApiRequest;

class CreateProject extends ApiRequest{

   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "project_name" => 'required|min:3',
            // "status" => 'required|numeric',
            // "customer_id" => 'required|numeric',
            // "project_cost"=>'require|numeric'
        ];
        
    }
}