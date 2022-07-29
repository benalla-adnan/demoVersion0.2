<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Language;
use App\Models\lead_sources;
use App\Models\lead_status;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view('backend.pages.settings.settings');
    }
    public function languages(){
        $data = Language::paginate(4);
        return view('backend.pages.settings.languages.languages-settings',compact('data'));
    }
    public function editLanguage($id){
        $data = Language::find($id);
        return view('backend.pages.settings.languages.languages-edit',compact('data'));
    }

    public function createLanguage(){
        return view('backend.pages.settings.languages.language-add');
    }
    public function storeLanguage(Request $request){

        $language = new Language();
        $language->name = $request->name;
        $language->short_name = $request->short_name;
        $language->status = $request->status;


    }

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
