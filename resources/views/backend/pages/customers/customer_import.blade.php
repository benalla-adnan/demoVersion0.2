@extends('layouts.master')
@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Customers
@endsection

@section('title_page2')
    Add Customer
@endsection
@section('content')
<!-- Main content -->
<div class="col-sm-12" id="import-customer-container">
  <div class="card Recent-Users">
    <div class="card-header">      
      <h5><a href="{{ url('admin/customer/list') }}">{{ __('Customers') }}</a> >> {{ __('Import Customer') }}</h5>
      <div class="card-header-right">
          
      </div>
    </div>

<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered">
              <thead>
              <tr>
                  
                <th class="star-sign">{{ __('First Name') }}<span class="color_ff2d42">*</span></th>
                <th class="star-sign">{{ __('Last Name') }}<span class="color_ff2d42">*</span></th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Phone') }}</th>

              </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Michel </td>
                  <td>Anam</td>
                  <td>anam@test.com</td>
                  <td>0136664981</td>
                

                
                </tr>
              </tbody>
            </table>
          </div>
          <span class="badge bg-info">{{ __('Note') }}</span> <small class="text-info">{{ __('Required field is mendatory') }}</small>

          <br><br>
          <form action="{{ url('admin/customerimportcsv') }}" method="post" id="myform1" class="form-horizontal" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="form-group">
                <div class="row">
                  <label class="col-md-2 control-label pt-1">{{ __('Choose  File') }}
                  <span class="text-danger">*</span>
                </label>
                  <div class="custom-file col-md-8">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="xlsx_file" id="validatedCustomFile">
                      <button type="submit" class="btn btn-primary btn-sm px-4 ">Import</button>
                    </div>                    
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 control-label note"></label>
                <div class="col-md-8" id='note_txt_1'>
                  <span class="badge bg-info">{{ __('Note') }}</span> <small class="text-info">{{ __('Allowed File Extensions: xlsx') }}</small>
                </div>
                <div class="col-md-8" id='note_txt_2'>                      
                </div>
              </div>
          
            <!-- /.box-body -->
            <div class="col-sm-8 px-0 mt-3">
              <button class="btn btn-primary custom-btn-small" type="submit" id="submit">{{ __('Submit') }}</button>   
              <a href="{{ url('customer/list') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
            </div>
            <!-- /.box-footer -->
          </form>
</div>
  </div>
</div>

@endsection

@section('js') 
<script src="{{ asset('public/dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/dist/js/custom/customer.min.js') }}"></script>
@endsection
