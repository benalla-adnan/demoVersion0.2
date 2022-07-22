<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
 public function list(){
    $data['projects'] = projects::join('customers','customers.id','=','customer_id')->get(['projects.id as idP','projects.project_name','projects.detail','projects.project_type','projects.customer_id','projects.user_id','projects.project_status_id','projects.charge_type','projects.begin_date','projects.due_date','projects.improvement','projects.improvement_from_task','projects.completed_date','projects.cost','projects.per_hour_project_scale','projects.estimated_hours','customers.id as idC','customers.name','customers.first_name','customers.last_name','customers.email','customers.phone']);
   //return $data;
    //print_r($list); die;
    return view('backend.pages.project.project-list',$data);
 }

 public function destroy($id){
   projects::destroy($id);
   return back();
}
}
