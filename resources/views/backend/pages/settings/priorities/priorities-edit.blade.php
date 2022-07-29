@extends('layouts.master')
@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Priority
@endsection

@section('title_page2')
    Edit Priority
@endsection
@section('content')
<div class="col-sm-12" id="leadEdit-container">
    <div class="card">
      <div class="card-header">
        <h5> <a href="{{ url('admin/priorities') }}">{{ __('Priority List') }}</a> >> {{ __('Edit Priority') }}</h5>
        <div class="card-header-right">
            
        </div>
      </div>
      <div class="card-body table-border-style">
        <div class="form-tabs">
         
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Edit Priority Information') }}</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          
                  <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                  <input type="hidden" value="{{ $priorities->id }}" name="department_id" id="department_id"> 
                  <form action="{{ url('admin/edit-priority/'.$priorities->id) }}" method="POST" id="departmentEdit" class="form-horizontal">
                  
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">Priority Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $priorities->name }}">
                        </div>
                        <div class="col-sm-9 px-0 pt-2">
                            <button class="btn btn-primary custom-btn-small" type="submit" id="btnSubmit">{{ __('Update') }}</button>   
                            <a href="{{ url('admin/priorities') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
                          </div> 
                    </div>
                  </form>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection