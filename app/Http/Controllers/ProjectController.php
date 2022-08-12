<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\customers;
use App\Models\Project;
use App\Models\projects;

use App\User as User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema as FacadesSchema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\Schema;

class ProjectController extends Controller
{
 public function list(){
    $data['projects'] = projects::join('customers','customers.id','=','customer_id')->get(['projects.id as idP','projects.project_name','projects.detail','projects.project_type','projects.customer_id','projects.user_id','projects.project_status_id','projects.charge_type','projects.begin_date','projects.due_date','projects.improvement','projects.improvement_from_task','projects.completed_date','projects.cost','projects.per_hour_project_scale','projects.estimated_hours','customers.id as idC','customers.name','customers.first_name','customers.last_name','customers.email','customers.phone']);
   //return $data;
    //print_r($list); die;
    return view('backend.pages.project.project-list',$data);
 }

 public function createProject(){
   $data['projectStatus'] = DB::table('project_statuses')->get();
   $data['customers']     = DB::table('customers')->where('is_active', 1)->get();
   $data['departments']   = DB::table('departments')->first();
   $data['priorities']    = DB::table('priorities')->get();
   $data['assignees']     = DB::table('users')->where('is_active', 1)->get();
   $data['ticketStatus']  = DB::table('ticket_statuses')->get();
   $data['users'] = User::where('is_active',1)->get();
   return view('backend.pages.project.project-add', $data);
 }

 public function storeProject( Request $request){
  
  $this->validate($request, [
      
         'project_name' => 'required',
        'status' => 'required',
         'begin_date' => 'required',
         'due_date' => 'required',
         'members'=>'required',

         ]);
        

      
        
         
         try{
          
            
           
            $newProject = new Project();
            $projectMembers = $request->members;
            $newProject ->project_name = ($request->project_name);
            $newProject ->detail               = $request->detail;
            $newProject ->project_type           = $request->project_type;
            $newProject ->customer_id            = (($request->project_type) == 'customer' ? $request->customer_id : NULL);
            $newProject ->user_id                = Auth::guard('admin')->user()->id;
            $newProject ->project_status_id      = $request->status;
            $newProject ->charge_type            = $request->charge_type;
            $newProject ->begin_date             = ($request->begin_date);
            $newProject ->due_date               = $request->due_date;
            $newProject ->improvement            = 0;
            $newProject ->improvement_from_task  = 0;
            $newProject ->cost                   = $request->charge_type == 1 ? ($request->cost) : 0;
            $newProject ->per_hour_project_scale = ($request->per_hour_project_scale);
            $newProject ->estimated_hours        = ($request->estimated_hours);

            $newProject->save();
            $id = $newProject->id;
            DB::commit();

            ;
            
          if (!empty($projectMembers)) {
            foreach ($projectMembers as $key => $value) {
              $projectData['project_id'] = $id;
              $projectData['user_id']    = $value;
              DB::table('project_members')->insert($projectData);

             
            }
          }
        
        
         }catch (Exception $e) {
           return $e;
            DB::rollBack();
            return redirect('admin/project')->withErrors(__('Failed To Add The Project'));
          }

          if (!empty($id)) {
            Session::flash('success', __('Successfully Saved'));
            return redirect('admin/project');
        } else {
            return back()->withInput()->withErrors(['email' => __("Invalid Request")]);
        }
         
 }

 public function destroy($id){
   FacadesSchema::disableForeignKeyConstraints();
   projects::destroy($id);
   FacadesSchema::enableForeignKeyConstraints();
   return back();
}
}
