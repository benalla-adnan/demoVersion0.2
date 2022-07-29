<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Language;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

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
        Priority::destroy($id);
        return back();
    }
}
