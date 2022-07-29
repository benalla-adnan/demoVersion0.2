@extends('layouts.master')
@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Departements
@endsection

@section('title_page2')
    Add Departement
@endsection
@section('content')
  <div class="col-sm-12" id="departmentAdd-container">
    <div class="card">
      <div class="card-header">
        <h5> <a href="{{url('departments')}}">{{ __('Departments List') }}</a> >> {{ __('New Department') }}</h5>

        <div class="card-header-right">

        </div>
      </div>
      <div class="card-body table-border-style">
        <div class="form-tabs">
          <form action="{{url('admin/create-department')}}" method="POST" id="departmentAdd" class="form-horizontal">
            @csrf
            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('New Information') }}</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-sm-9">
                    <div class="form-group row">

                      <div class="col-sm-10">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label require" for="inputEmail3">{{ __('Department Name') }}</label>
    
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="{{ __('Department Name') }}"  name="name" value="{{ old('name')}}">
                            </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-sm-9 px-0 pt-2">
                <button class="btn btn-primary custom-btn-small" type="submit" id="btnSubmit"><i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Submit') }}</span></button>
                <a href="{{ url('admin/departments') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection