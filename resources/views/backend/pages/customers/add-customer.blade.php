@extends('layouts.master')
@section('title')
    CRM-pereine
@endsection



@section('title_page2')
    Add Customer
@endsection
@section('content')

<div class="col-sm-12" id="add-customer-container">
    <div class="card">
      <div class="card-header">
        <h5><a href="{{ url('admin/customer/list') }}">{{ __('Customers') }}</a> >> {{ __('New Customer') }}</h5>
        <div class="card-header-right">
        </div>
      </div>
      <div class="card-body table-border-style" >
        <div class="form-tabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Customer Information') }}</a>
            </li>
            
          </ul>
          <form action="{{ url('admin/create-customer') }}" method="post" id="customerAdd" class="form-horizontal">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active mb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">

             
                    
                <div class="form-group row">
                  <label for="first_name" class="col-sm-2 control-label require">{{ __('First Name') }}</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="{{ __('First Name') }}">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="last_name" class="col-sm-2 control-label require">{{ __('Last Name') }}</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="{{ __('Last Name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">{{ __('Email') }}</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control email-input" id="email" value="{{ old('email') }}" name="email" placeholder="{{ __('Email') }}">
                        <label for="email_error" class="error display_none" id="val_email"></label>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 control-label require" for="currency_id">{{ __('Currency') }}</label>
                  <div class="col-sm-6">
                    <select class="js-example-basic-single form-control" name="currency_id" id="currency_id">
                      <option value="">{{ __('Select One') }}</option>
                      @foreach($currencies as $key => $value)
                        <option value="{{ $key }}" {{ $key == old('currency_id') ? 'selected' : '' }} >{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2">
                    <label for="currency_id" id="error-currency" generated="true" class="error"></label>
                  </div>  
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 control-label">{{ __('Phone') }}</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ old('phone') }}" id="phone" name="phone" placeholder="{{ __('Phone') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tax_id" class="col-sm-2 control-label">{{ __('Tax Id') }}</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ old('tax_id') }}" id="tax_id" name="tax_id" placeholder="{{ __('Tax Id') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bill_street" class="col-sm-2 control-label">{{ __('Street') }}</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ old('bill_street') }}" id="bill_street" name="bill_street" placeholder="{{ __('Street') }}">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="bill_city" class="col-sm-2 control-label">{{ __('City') }}</label>
                  <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{ old('bill_city') }}" id="bill_city" name="bill_city" placeholder="{{ __('City') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="bill_state" class="col-sm-2 control-label">{{ __('State') }}</label>
                  <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{ old('bill_state')}}" id="bill_state" name="bill_state" placeholder="{{ __('State') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="bill_zipCode" class="col-sm-2 control-label">{{ __('Zip Code') }}</label>
                  <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{ old('bill_zipCode') }}" id="bill_zipCode" name="bill_zipCode" placeholder="{{ __('Zip Code') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="bill_country_id" class="col-sm-2 control-label">{{ __('Country') }}</label>
                    <div class="col-sm-6">
                      <select class="js-example-basic-single form-control" id="bill_country_id" name="bill_country_id">
                        <option value="">{{ __('Select One') }}</option>
                        @foreach($countries as $key => $value)
                          <option value="{{ $key }}" {{ $key == old('bill_country_id') ? 'selected' : '' }} >{{ $value }}</option>
                        @endforeach
                      </select> 
                     
                    </div>                          
                </div>
                <div class="form-group row">
                  <lebel class="col-sm-2 control-label"></lebel>
                  {{-- <div class="col-sm-6 checkbox checkbox-primary checkbox-fill d-inline ml-dot80rem">
                    <input type="checkbox" class="form-control" name="sendMail" id="checkbox-p-fill-1">
                    <label for="checkbox-p-fill-1" class="cr">{{ __('Send Email to the Customer') }}</label>
                  </div> --}}
                </div>
              </div>
              <div class="tab-pane fade mb-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <label id="copy" class="badge badge-pill  theme-bg2 text-white float-right">{{ __('Copy Address') }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ship_street" class="col-sm-2 control-label">{{ __('Street') }}</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="ship_street" name="ship_street" value="{{ old('ship_street') }}" placeholder="Street">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ship_city" class="col-sm-2 control-label">{{ __('City') }}</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="ship_city" name="ship_city" value="{{ old('ship_city') }}" placeholder="Street">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ship_state" class="col-sm-2 control-label">{{ __('State') }}</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="ship_state" name="ship_state" value="{{ old('ship_state') }}" placeholder="State">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ship_zipCode" class="col-sm-2 control-label">{{ __('Zip Code') }}</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="ship_zipCode" name="ship_zipCode" value="{{ old('ship_zipCode') }}" placeholder="Zip code">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ship_country_id" class="col-sm-2 control-label">{{ __('Country') }}</label>
                      <div class="col-sm-6">
                        <select class="js-example-basic-single form-control" id="ship_country_id" name="ship_country_id">
                          <option value="">{{ __('Select One') }}</option>
                          @foreach ($countries as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                        </select>    
                      </div>
                      </div>  
                    </div>
                  </div>
              </div>
              <div class="col-sm-9 px-0 pt-2">
                <button class="btn btn-primary custom-btn-small" type="submit" id="btnSubmit"><i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Submit') }}</span></button>
                <a href="{{ url('admin/customer/list')}}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
              </div>
            </div>
             
          </form> 
            </div>              
        </div>
      </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/dist/js/jquery.validate.min.js') }}"></script>
{{-- {!! translateValidationMessages() !!} --}}
<script src="{{ asset('public/dist/js/custom/customer.min.js') }}"></script>
@endsection