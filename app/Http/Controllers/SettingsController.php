<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Language;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Models\Currency;

use App\Models\lead_sources;
use App\Models\lead_status;


class SettingsController extends Controller
{
    public function index(){
        return view('backend.pages.settings.settings');
    }


    public function languages(){
        $data = Language::all();
        return view('backend.pages.settings.languages.languages-settings',compact('data'));
    }
    public function listLanguage()
    {
        $data = Language::all();
        return view('backend.pages.settings.languages.languages-settings',compact('data'));
    }

    public function createLanguage(){
        return view('backend.pages.settings.languages.create-languages');
    }

    public function storeLanguage(Request $request){

        $this->validate($request, [
            'name' => 'required|min:2|unique:languages,name',
            'short_name'=>'required|min:2|unique:languages,short_name',
            //'status'=>'required',
        ]);

        
        $newLanguage  = new Language();
        $newLanguage->name    = $request->name;
        $newLanguage->short_name    = $request->short_name;
        $newLanguage->status     = "Active";
        $newLanguage->save();
        
        $id = $newLanguage->id;
           

                if (!empty($id)) {
                    Cache::forget('gb-languages');
                    Session::flash('success', __('Successfully Saved'));
                    return redirect('admin/languages');
                } else {
                    return back()->withInput()->withErrors(['name' => __("Invalid Request")]);
                }
        
    }

    public function editLanguage($id){
        $data['menu'] = 'languages';
        $data['page_title']   = __('Edit Language');
        $data['languages']   = Language::find($id);
        if (empty($data['languages'])) {
            Session::flash('fail', __('Language not found'));
            return redirect('admin/languages');
        }
  

        return view('backend.pages.settings.departments.departments-edit',$data);
    }

    public function updateLanguage(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required',
            'short_name'=>'required',
            'status' => 'required',
        ]);

        $languages =  Language::find($request->id);
        $languages->name = $request->name;
        $languages->save();
        return redirect('admin/languages');
    }

    public function destroyLanguage($id){
        Language::destroy($id);
        return back();
    }

 //Department

    public function departments(){
        $data = Department::all();
        return view('backend.pages.settings.departments.departments-settings',compact('data'));
    }

    public function listDepartment()
    {
        $data = Department::all();
        return view('backend.pages.settings.departments.departments-settings',compact('data'));
    }

    public function createDepartment(){
        return view('backend.pages.settings.departments.create-departments');
    }

    public function storeDepartment(Request $request){

        $this->validate($request, [
            'name' => 'required|min:2|unique:departments,name'
        ]);

        $data['name'] = $request->name;
        $newDepartment  = new Department();
        $newDepartment->name    = $data['name'];
        $newDepartment->save();
        
        $id = $newDepartment->id;
           

                if (!empty($id)) {
                    Cache::forget('gb-departments');
                    Session::flash('success', __('Successfully Saved'));
                    return redirect('admin/departments');
                } else {
                    return back()->withInput()->withErrors(['name' => __("Invalid Request")]);
                }
        
    }

    public function editDepartment($id){
        $data['menu'] = 'department';
        $data['page_title']   = __('Edit Department');
        $data['departments']   = Department::find($id);
        if (empty($data['departments'])) {
            Session::flash('fail', __('Department not found'));
            return redirect('departments');
        }
  

        return view('backend.pages.settings.departments.departments-edit',$data);
    }

    public function updateDepartment(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required',
        ]);

        $departments =  Department::find($request->id);
        $departments->name = $request->name;
        $departments->save();
        return redirect('admin/departments');
    }

    public function destroyDepartment($id){
        Department::destroy($id);
        return back();
    }

    //Priorities

    public function priorities(){
        $data = Priority::all();
        return view('backend.pages.settings.priorities.priorities-settings',compact('data'));
    }

    public function listPriorities()
    {
        $data = Priority::all();
        return view('backend.pages.settings.priorities.priorities-settings',compact('data'));
    }

    public function createPriorities(){
        return view('backend.pages.settings.priorities.create-priority');
    }

    public function storePriorities(Request $request){

        $this->validate($request, [
            'name' => 'required|min:2|unique:priorities,name'
        ]);

        $data['name'] = $request->name;
        $priority  = new Priority();
        $priority->name    = $data['name'];
        $priority->save();
        
        $id = $priority->id;
           

                if (!empty($id)) {
                    Cache::forget('gb-priorities');
                    Session::flash('success', __('Successfully Saved'));
                    return redirect('admin/priorities');
                } else {
                    return back()->withInput()->withErrors(['name' => __("Invalid Request")]);
                }
        
    }

    public function editPriorities($id){
        $data['menu'] = 'priority';
        $data['page_title']   = __('Edit Priority');
        $data['priorities']   = Priority::find($id);
        if (empty($data['priorities'])) {
            Session::flash('fail', __('Priority not found'));
            return redirect('admin/priorities');
        }
  

        return view('backend.pages.settings.priorities.priorities-edit',$data);
    }

    public function updatePriorities(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required',
        ]);

        $priorities = Priority::find($request->id);
        $priorities ->name = $request->name;
        $priorities ->save();
        return redirect('admin/priorities ');
    }

    public function destroyPriorities($id){
        Priority::destroy($id);}

    

    public function currencies(){
        $data = Currency::paginate(4);
        return view('backend.pages.settings.currencies.currencies',compact('data'));
    }

    public function createCurrency(){

        return view('backend.pages.settings.currencies.add-currencies');
    }
    
    public function storeCurrency(Request $request){
        $this->validate($request, [
            'name' => 'required|unique',
            'symbol' => 'required|unique',
            'exchange_rate' => 'required',
            'exchange_from' => 'required',
  
        ]);

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->symbol= $request->symbol;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->exchange_from  = $request->exchange_from;
        $currency->save();
        return back();

    }
    public function editCurrency($id){
        $currency = Currency::find($id);
        return view('backend.pages.settings.currencies.edit-currencie',compact('currency'));
    }
    public function updateCurrency(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'symbol' => 'required',
            'exchange_rate' => 'required',
            'exchange_from' => 'required',
  
        ]);
        $currency = Currency::find($request->id);
        $currency->name = $request->name;
        $currency->symbol= $request->symbol;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->exchange_from  = $request->exchange_from;
        $currency->save();
        return redirect('admin/currencies');
    }


    public function destroyCurrency($id){
        Currency::destroy($id);
        return back();
    }

    public function leadStatus(){
        $data = lead_status::paginate(4);
        return view('backend.pages.settings.lead_status.lead_status',compact('data'));
    }

    public function createLeadStatus(){
        return view('backend.pages.settings.lead_status.add-lead_status');
    }
    public function editLeadStatus($id){
        $lead_status = lead_status::find($id);
        return view('backend.pages.settings.lead_status.edit-lead_status',compact('lead_status'));
    }
    public function updateLeadStatus(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'status' => 'required',  
        ]);        
        $leadstatus = lead_status::find($request->id);
        $leadstatus->name = $request->name;
        $leadstatus->color = $request->color;
        $leadstatus->status = $request->status;
        $leadstatus->save();
        return redirect('admin/LeadStatus');

    }

    public function storeLeadStatus(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'status' => 'required',  
        ]);
        $leadstatus = new lead_status();
        $leadstatus->name = $request->name;
        $leadstatus->color = $request->color;
        $leadstatus->status = $request->status;
        $leadstatus->save();
        return redirect('admin/LeadStatus');

    }

    public function destroyLeadStatus($id){
        lead_status::destroy($id);
        return back();
    }

    public function leadSource(){
        $data = lead_sources::paginate(4);
        return view('backend.pages.settings.lead_source.lead_source',compact('data'));
    }

    public function editLeadSource($id){
        $leadsource = lead_sources::find($id);
        return view('backend.pages.settings.lead_source.edit-lead_source',compact('leadsource'));
    }

    public function updateLeadSource(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',  
        ]);        
        $leadsource = lead_sources::find($request->id);
        $leadsource->name = $request->name;
        $leadsource->status = $request->status;
        $leadsource->save();
        return redirect('admin/LeadSource');

    }

    public function createLeadSource(){
        return view('backend.pages.settings.lead_source.add-lead_source');
    }
    public function storeLeadSource(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:lead_sources',
            'status' => 'required',  
        ]);
        $leadsource = new lead_sources();
        $leadsource->name = $request->name;
        $leadsource->status = $request->status;
        $leadsource->save();
        return redirect('admin/LeadSource');

    }

    public function destroyLeadSource($id){
        lead_sources::destroy($id);
        return back();
    }
}
