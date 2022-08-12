@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ asset('dist/plugins/Responsive-2.2.5/css/responsive.dataTables.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('datta-able/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/task-list.css') }}">
  <link rel="stylesheet" href="{{asset('dist/plugins/lightbox/css/lightbox.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/task-design.min.css?v=1.0') }}">
@endsection
@section('content')
  <!-- Main content -->
  
<div class="col-sm-12" id="list-task-container">
  <div class="card">
    <div class="card-header">
      <h5>{{ __('Task List') }}</h5>
      <div class="card-header-right d-inline-block">
        {{-- @if(Helpers::has_permission(Auth::user()->id, 'add_task')) --}}
          <a href="{{ url('admin/project/task/add') }}" class="btn btn-outline-primary custom-btn-small"><span class="fa fa-plus"> &nbsp;</span>{{ __('New Task') }}</a>
       {{-- @endif --}}
      </div>
    </div>
    <div class="card-body p-0">
      {{-- <form class="form-horizontal" action="{{ url('task/list') }}" method="GET">
        <input class="form-control" id="startfrom" type="hidden" name="from" value="<?= isset($from) ? $from : '' ?>">
        <input class="form-control" id="endto" type="hidden" name="to" value="<?= isset($to) ? $to : '' ?>">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ml-2">
          <div class="row mt-3">
            <div class="col-md-12 col-xl-3 col-lg-4 col-sm-12 col-xs-12 mb-2">
              <div class="input-group">
                <button type="button" class="form-control" id="daterange-btn">
                  <span class="float-left">
                    <i class="fa fa-calendar"></i>  {{ __('Date Range') }}
                  </span>
                  <i class="fa fa-caret-down float-right pt-1"></i>
                </button>
              </div>
            </div>
            <div class="col-md-12 col-xl-3 col-lg-3 col-sm-12 col-xs-12 mb-2">
                <select class="form-control select2"  name="project" id="project">
                  <option value="">{{ __('All projects') }}</option>
                  @if(!empty($projects))
                    @foreach($projects as $project)
                      <option value="{{$project->id}}" >{{$project->project_name}}</option>
                    @endforeach
                  @endif
                </select>
            </div>
            <div class="col-md-12 col-xl-3 col-lg-3 col-sm-12 col-xs-12 mb-2">
              <select class="form-control select2" name="assignee" id="assignee">
                <option value="">{{ __('All assignees') }}</option>
                @if(!empty($assignees))
                  @foreach($assignees  as $data)
                    <option value="{{$data->id}}" {{$data->id == $allassignee ? 'selected' : ''}} >
                      {{ ($data->full_name)}}
                    </option>
                  @endforeach
                @endif
              </select>
            </div>
            <div class="col-md-12 col-xl-2 col-lg-2 col-sm-12 col-xs-12 mb-2">
              <select class="form-control select2" name="status" id="status">
                <option value="">{{ __('All status') }}</option>
                @if(!empty($task_statuses_all))
                  @foreach($task_statuses_all as $data)
                    <option value="{{$data->id}}" {{$data->id == $allstatus ? "selected": ''}}>{{$data->name}}</option>
                  @endforeach
                @endif
              </select>
            </div>

            <div class="col-xl-1 col-lg-1 col-md-12 col-sm-1 col-xs-12 pl-md-3">
              <button type="submit" name="btn" title="Click to filter" class="btn btn-primary custom-btn-small mt-0 mr-0">{{ __('Go') }}</button>
            </div>
          </div>
        </div>
      </form> --}}


      <div class="card-block mt-1">
        <div class="table-responsive">
          {{-- {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
          @if (isset($task) && !empty($task))
            <span class="task-v-preview"><a href=""  class="task_class display_none" data-id="{{ $task->id }}" data-priority-id="{{ $task->priority_id }}" project_id="{{ $task->related_to_type == 1 ? $task->related_to_id : '' }}" data-status-id=" {{ $task->task_status_id }}" type="button" data-toggle="modal" data-target="#task-modal">{{ $task->name }}</a></span>
          @endif --}}
          <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th> 
                <th>Status</th>
                <th>Start date</th>
                <th>Due date</th>
                <th>Actions</th>
            </tr>
            </thead>
            @foreach($task as $data)
            <tbody>
            <tr>
              <td>{{$data->id}}</td>
                <td>
                    {{$data->name}}
                </td>
                <td> <span style="color: {{$data->TaskStatus->color}}">{{$data->TaskStatus->name}}</span>
                </td>
                <td>{{$data->start_date}}</td>
                <td>{{$data->due_date}}</td>  
                <td>                                                  
                    <a href="{{url('admin/project/task/edit/'.$data->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                    <a href="{{url('admin/project/task/destroy/'.$data->id)}}" value="{{$data->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table> 
        </div>
      </div>
    </div>
  </div>
</div>
{{-- @include('backend.pages.task.details') --}}
{{-- <div class="modal fade" id="theModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="theModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary custom-btn-small" data-dismiss="modal">{{ __('Close') }}</button>
        <button type="button" id="theModalSubmitBtn" data-task="" class="btn btn-danger custom-btn-small">{{ __('Submit') }}</button>
        <span class="ajax-loading"></span>
      </div>
    </div>
  </div>
</div> --}}
@endsection

@section('scripts')
<script src="{{ asset('dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
<script src="{{ asset('dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dist/js/moment.min.js') }}"></script>
<script src="{{ asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
{!! $dataTable->scripts() !!}
@include('backend.pages.task.details_script')
<script type="text/javascript">
  'use strict';
  var startDate = "{!! isset($from) ? $from : 'undefined' !!}";
  var endDate   = "{!! isset($to) ? $to : 'undefined' !!}";
</script>
<script src="{{ asset('dist/js/custom/task.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/js/html5lightbox/html5lightbox.js?v=1.0') }}"></script>
@endsection
