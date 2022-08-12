@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{asset('datta-able/plugins/select2/css/select2.min.css')}}"> 
<link rel="stylesheet" href="{{ URL::asset('dist/plugins/jQueryUI/jquery-ui.min.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/invoice-style.min.css')}}">
<link href="{{ URL::asset('assets/plugins/select/selectr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Main content -->
<div class="col-sm-12" id="add-task-container">
    <div class="card user-list">
        <div class="card-header">
            <h5><a href="{{ url('admin/task/list') }}">{{ __('Tasks') }}</a> >> {{ __('New Task') }}</h5>
            <div class="card-header-right">
                
            </div>
        </div>
        <div class="card-block">
            <div class="form-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Task Info') }}</a>
                    </li>
                    <li class="nav-item"></li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form class="form-horizontal" action="{{url('admin/project/task/store')}}" method="post" id="taskForm" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group row">
                                    <label for="task_name" class="col-sm-2 col-form-label require">{{ __('Subject') }}</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name="task_name" id="task_name" placeholder="{{ __('Enter task name') }}">
                                    </div>
                                </div>
                                <div class="form-group row" id="hourly_rate_div">
                                    <label for="hourly_rate" class="col-sm-2 col-form-label require">{{ __('Hourly Rate') }}</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control positive-float-number" name="hourly_rate" id="hourly_rate">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_date" class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                                    <div class="col-sm-3">
                                        <div class="input-group date p-md-0">
                                          <div class="input-group-prepend">
                                            <i class="fas fa-calendar-alt input-group-text"></i>
                                          </div>
                                          <input type="datetime-local" class="form-control" id="startDate" name="start_date" placeholder="{{ __('Select Date') }}">
                                        </div>
                                    </div>
                                    <label for="dueDate" class="col-sm-2 col-form-label">{{ __('Due Date') }}</label>
                                    <div class="col-sm-3">
                                        <div class="input-group date p-md-0">
                                          <div class="input-group-prepend">
                                            <i class="fas fa-calendar-alt input-group-text"></i>
                                          </div>
                                          <input type="datetime-local" class="form-control" id="due_date" name="due_date" placeholder="{{ __('Select Date') }}">
                                          <label for="due_date" generated="true" class="error" id="due_date-error"></label>
                                        </div>
                                    </div>
                                </div>     
                                <div class="form-group row">
                                    <label for="related_to" class="col-sm-2 col-form-label require">{{ __('Related To') }}</label>
                                    <div class="col-sm-3">
                                        <select class="js-example-basic-single form-control" name="related_to" id="related_to">
                                            <option value="0"></option>
                                            <option value="1">{{ __('Project') }}</option>
                                            <option value="2">{{ __('Customer') }}</option>
                                            <option value="3">{{ __('Ticket') }}</option>
                                        </select>
                                    </div>

                                 

                                    <label for="priority" class="col-sm-2 col-form-label">{{ __('Priority') }}</label>
                                    <div class="col-sm-3">
                                        <select class="js-example-basic-single form-control" name="priority_id" id="priority">
                                            @foreach($priorities as $data)
                                                <option value="{{$data->id}}" <?= (strtolower($data->name) == "low" ? 'selected':'')?> >{{$data->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="projects">
                                    <label class="col-sm-2 control-label">{{ __('projects') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="projects" id="projects" >
                                            @foreach($project as $data)
                                                <option value="{{ $data->id }}">{{ $data->project_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="form-group row display_none" id="milestone_div">
                                    <label for="milestone" class="col-sm-2 col-form-label">{{ __('Milestone') }}</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="milestone" name="milestone_id">
                                        </select>
                                    </div>
                                </div>
                            

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ __('Assignee') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="assignee[]"  multiple="multiple">
                                            @foreach($assignees as $key=>$user)
                                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="col-sm-3">
                                        <a id="assign_me">{{ __('Assign me') }}</a>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="tags" class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" name="tags" >
                                        @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <!-- Checklist  starts-->
                                <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Checklist') }}</label>
                                        <div class="col-sm-8">
                                            <div id="checkListDiv">
                                                <div class="flexContainer">
                                                    <input type="text" id="myInput" class="form-control">
                                                    <span id="checklistAddBtn" class="checklistAddBtn">
                                                        <i class="fa fa-plus-square"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="listHolderDiv" name="listHolderDiv">
                                                <ul id="myUL" name="myUL">    
                                                </ul>
                                                <div id="checklistCollector" name="checklistCollector">    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Checklist  Ends-->
                                <div class="col-sm-8 px-0 mt-2">
                                    <button class="btn btn-primary custom-btn-small" type="submit" id="btnSubmit"><i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Submit') }} </span></button>   
                                    <a href="{{ url('admin/project/task/view') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </div>                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
<script>
        $(function () {

$('#related_to').on('change', function() {
    
        if ( this.value != 1)
            {
                $("#projects").hide();
            }
            else{
                $("#projects").show();
            }
        

    });
}); 
</script>

@endsection


