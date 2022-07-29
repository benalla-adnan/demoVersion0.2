<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\projects;

use App\User as User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema as FacadesSchema;
use Nette\Schema\Schema;

class ProjectController extends Controller
{
 public function list(){
    $data['projects'] = projects::join('customers','customers.id','=','customer_id')->get(['projects.id as idP','projects.project_name','projects.detail','projects.project_type','projects.customer_id','projects.user_id','projects.project_status_id','projects.charge_type','projects.begin_date','projects.due_date','projects.improvement','projects.improvement_from_task','projects.completed_date','projects.cost','projects.per_hour_project_scale','projects.estimated_hours','customers.id as idC','customers.name','customers.first_name','customers.last_name','customers.email','customers.phone']);
   //return $data;
    //print_r($list); die;
    return view('backend.pages.project.project-list',$data);
 }

 public function create(){
   $data['projectStatus'] = DB::table('project_statuses')->get();
   $data['customers']     = DB::table('customers')->where('is_active', 1)->get();
   $data['departments']   = DB::table('departments')->first();
   $data['priorities']    = DB::table('priorities')->get();
   $data['assignees']     = DB::table('users')->where('is_active', 1)->get();
   $data['ticketStatus']  = DB::table('ticket_statuses')->get();
   $data['users'] = User::where('is_active',1)->get();
   return view('backend.pages.project.project-add', $data);
 }

 public function store( Request $request){
   $this->validate($request,[
         'project_name ' => 'required',
         'status' => 'required',
         'begin_date' => 'required',
         'members'=>'required',

         ]);

         try{
            DB::beginTransaction();
            $projectMembers = $request->members;
            $data['name'] = stripBeforeSave($request->project_name);
            $data['detail']                 = $request->detail;
            $data['project_type']           = $request->project_type;
            $data['customer_id']            = (($request->project_type) == 'customer' ? $request->customer_id : NULL);
            $data['user_id']                = $user_id = Auth::user()->id;
            $data['project_status_id']      = $request->status;
            $data['charge_type']            = $request->charge_type;
            $data['begin_date']             = DbDateFormat($request->begin_date);
            $data['due_date']               = $request->due_date ? DbDateFormat($request->due_date) : NULL ;
            $data['improvement']            = 0;
            $data['improvement_from_task']  = 0;
            $data['cost']                   = $request->charge_type == 1 ? validateNumbers($request->cost) : 0;
            $data['per_hour_project_scale'] = validateNumbers($request->per_hour_project_scale);
            $data['estimated_hours']        = validateNumbers($request->estimated_hours);

            $insertId                       = DB::table('projects')->insertGetId($data);

          

            DB::commit();
         }catch (Exception $e) {
            DB::rollBack();
            return redirect('project/details/'.$insertId)->withErrors(__('Failed To Add The Project'));
          }
         
 }

 public function destroy($id){
   FacadesSchema::disableForeignKeyConstraints();
   projects::destroy($id);
   FacadesSchema::enableForeignKeyConstraints();
   return back();
}
}
