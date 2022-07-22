@extends('layouts.master')

@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Lead
@endsection

@section('title_page2')
    Lead Information
@endsection
@section('content')
    <!-- Main content -->
   
            <div class="card-body px-3 py-3 table-border-style">
                <div class="form-tabs">
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home"
                                role="tab" aria-controls="home" aria-selected="true">{{ __('Basic Information') }}</a>
                        </li>
            @if (!empty($data->description))
                <li class="nav-item">
                    <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile"
                        role="tab" aria-controls="profile" aria-selected="false">{{ __('Description') }}</a>
                </li>
            @endif
     
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active pt-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 lead-information-col">
                                    <table class="w-100 table">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="font-weight-700 text-dark text-18">Lead Information
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Name') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                                        {{ $data->first_name }} {{ $data->last_name }}
                                                    
                                                      </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Email') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                       
                                                        {{ !empty($data->email) ? $data->email : '' }}
                                                        
                                                    </span>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Phone') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                            {{ !empty($data->phone) ? $data->phone : '' }}
                                            
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Website') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                                        <a href="https://{{ !empty($data->website) ? $data->website : '#' }}" target="_blank" class="color_4293c2">
                                                           
                                                            {{ !empty($data->website) ? $data->website : '' }}
                                                        </a>
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Company') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                                        {{ !empty($data->company) ? $data->company : '' }}
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Street') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                     
                                                        {{ !empty($data->street) ? $data->street : '' }}
                                                    
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('City') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                                        {{ !empty($data->city) ? $data->city : '' }}
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('State') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                            {{ !empty($data->state) ? $data->state : '' }}
                                           
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Country') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                                        {{ !empty($data->country_id) ? $data->countries->name: '' }}
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Zip Code') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                                        {{ !empty($data->zip_code) ? $data->zip_code : '' }}
                                                        
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>

                                <div class="col-md-6 col-xs-12 lead-information-col">
                                    <table class="w-100 table">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="font-weight-700 text-dark text-18">General
                                                    Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Status') }}:&nbsp<br />
                                                    {{ !empty($data->lead_status_id) ? $data->statuses->name: '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Source') }}:&nbsp<br />
                                                    {{ !empty($data->lead_source_id) ? $data->sources->name: '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Assigned') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                            {{ !empty($data->assignee_id) ? $data->users->full_name : '' }}
                                            
                                                    </span>
                                                </td>
                                            </tr>

                                          

                                            <tr>
                                                <td colspan="3" class="font-bold text-left">
                                                    {{ __('Last Contact') }}:&nbsp<br />
                                                    {{ !empty($data->last_contact) ? $data->last_contact: '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" class="font-bold text-left">{{ __('Public') }}:&nbsp<br />
                                                    <span class="font-weight-400 text-dark">
                                                        
                                            {{ $data->is_public }}
                                            
                                                    </span>
                                                </td>
                                            </tr>

                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if (!empty($data->description))
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row p-9">
                                            <strong>
                                                <p class="font-bold">{{ __('Description') }}:&nbsp </p>
                                            </strong>
                                            <p class="bold font-medium-xs">
                                                {{ !empty($data->description) ? $data->description : '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        
  
    
@endsection
