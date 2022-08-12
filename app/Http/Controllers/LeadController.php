<?php

namespace App\Http\Controllers;


use App\Imports\LeadsImport;
use App\Exports\LeadsExport;
use App\Models\countries;
use App\Models\Lead;
use App\Models\lead_sources;
use App\Models\lead_status;
use App\Models\TagAssign;
use App\Models\tags;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;


class LeadController extends Controller
{

    public function index()
    {
            $datas = Lead::all();
            $statuses = lead_status::all();
            return view("backend.pages.lead.lead",compact("datas","statuses"));
    }

    public function create()
    {
        $data['countries'] = countries::all();
        $data['statuses']  = lead_status::where('status', 'active')->get();
        $data['sources']   = lead_sources::where('status', 'active')->get();
        $data['users']   = User::where(['is_active' => 1, 'deleted_at' => null])->get();
        return view('backend.pages.lead.lead-add', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'lead_status' => 'required',
            'lead_source' => 'required',
            'assigned' => 'required',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'email' => ['nullable','email','unique:customers,email'],
        ]);
        
         try {
            DB::beginTransaction();
                $lead = new Lead();
                $lead->first_name     = $request->first_name;
                $lead->last_name      = $request->last_name;
                $lead->email          = $request->email;
                $lead->street         = $request->street;
                $lead->city           = $request->city;
                $lead->state          = $request->state;
                $lead->zip_code       = $request->zipcode;
                $lead->country_id     = $request->country;
                $lead->phone          = $request->phone;
                $lead->website        = $request->website;
                $lead->company        = $request->company;
                $lead->description    = $request->description;
                $lead->lead_status_id = $request->lead_status;
                $lead->lead_source_id = $request->lead_source;
                $lead->assignee_id    = $request->assigned;
                $lead->user_id        = Auth::user()->id;
                if ($request->assigned) {
                    $lead->date_assigned = date('Y-m-d');
                }

                $lead->save();
                $id = $lead->id;
        DB::commit();
        } catch (\Exception $e) {
            return
            DB::rollBack();
            return redirect()->back()->withErrors(__('Failed To Add New Lead Information'));
        }

        if (!empty($id)) {
            Session::flash('success', __('Successfully Saved'));
            return redirect()->intended('/lead');
        } else {
            return back()->withInput()->withErrors(['email' => __("Invalid Request")]);
        }
    }

    public function edit($id){
        $data['menu'] = 'lead';
        $data['page_title']   = __('Edit Lead');
        $data['leadData']   = Lead::find($id);
        if (empty($data['leadData'])) {
            Session::flash('fail', __('Lead not found'));
            return redirect('lead');
        }
        $data['countries']  = countries::all();
        $data['statuses']   = lead_status::where('status','active')->get();
        $data['sources']    = lead_sources::where('status','active')->get();
        $data['users']      = User::where(['is_active' => 1, 'deleted_at' => null])->get();

        return view('backend.pages.lead.edit-lead',$data);
    }

    public function update(Request $request)
    {
        
        $this->validate($request, [
            'lead_status' => 'required',
            'lead_source' => 'required',
            'assigned' => 'required',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'email' => ['nullable','email','unique:customers,email,$request->customer_id,id'],
        ]);

        $lead =  Lead::find($request->lead_id);
        $lead->lead_status_id = $request->lead_status;
        $lead->lead_source_id = $request->lead_source;
        $lead->assignee_id = $request->assigned;
        $lead->last_contact = $request->contact_date;
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->website = $request->website;
        $lead->company = $request->company;
        $lead->description = $request->description;
        $lead->street = $request->street;
        $lead->city = $request->city;
        $lead->state = $request->state;        
        $lead->zip_code = $request->zipcode;
        $lead->country_id = $request->country;

        $lead->save();
        
        return redirect('leads');
    }
    public function view($id)
    {
        $data = Lead::find($id);
        $data['countries'] = countries::find($data->country_id);
        $data['statuses']  = lead_status::find($data->lead_status_id);
        $data['sources']   = lead_sources::find($data->lead_source_id);
        $data['users']   = User::find($data->assignee_id);
        //return $data;
        
        return view ('backend.pages.lead.lead-details',compact("data"));
}

public function import(Request $request){
    //return $request;
    Excel::Import(new LeadsImport($request->lead_status),request()->file('file'));
    return back();
}

public function destroy($id){
    Lead::destroy($id);
    return back();
}

public function export(){
    return Excel::download(new LeadsExport,('Leads.xlsx'));
}
}