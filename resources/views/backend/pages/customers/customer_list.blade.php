@extends('layouts.master')
@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Customers
@endsection

@section('title_page2')
Customers List
@endsection
@section('css')
<style>
  .table{
    background-color: lightgray;
  }
</style>
@endsection
@section('content')

@php
    $usr = Auth::guard('admin')->user();
    @endphp

<div class="buttonRelation mt-3">      
    
    <a href="{{ URL::to('admin/customerdownloadCsv') }}" class="btn btn-outline-primary custom-btn-small"><span class="fa fa-upload"> &nbsp;</span>{{ __('Export Customer') }}</a>
       
    <a href="{{ URL::to('admin/customerimport') }}" class="btn btn-outline-primary custom-btn-small"><span class="fa fa-upload"> &nbsp;</span>{{ __('Import Customer') }}</a>
    <a href="{{ url('admin/create-customer') }}" class="btn btn-outline-primary custom-btn-small"><span class="fa fa-plus"> &nbsp;</span>{{ __('New Customer') }}</a>
  </div>

<div class="card-body">
  <div class="table-responsive">
      <table class="table table-striped mb-0">
              <thead>
              <tr>
                  
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Currency</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
                 
              </tr>
              </thead>
              <tbody>
                  @foreach ($customersList as $customer)
                      <tr>
                          
                          <td> {{$customer->name}}</td>
                          <td>{{$customer->email}}</td>
                          <td>{{$customer->phone}}</td>
                          <td>{{ isset($customer->currency->name) && !empty($customer->currency->name) ? $customer->currency->name : "" }}</td>
                          <td>{{ $customer->is_active == 1 ? __('Active') :  __('Inactive') }} </td>
                          <td>{{$customer->created_at}}</td>
                          <td><a href="{{url('admin/edit-customer').'/'.$customer->id}}" value="{{$customer->id}}"><i class="las la-pen text-secondary font-16"></i></a>&nbsp;
                              <a href="{{url('admin/delete-customer').'/'.$customer->id}}" value="{{$customer->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a></td>
                      </tr>
                  @endforeach
        
          
        
              </tbody>
          </table><!--end /table-->
      </div>
          </div>
      </div>
  </div>
</div><!--end /tableresponsive-->
  </div><!--end card-body-->
</div><!--end card-->
</div> <!-- end col -->




@endsection