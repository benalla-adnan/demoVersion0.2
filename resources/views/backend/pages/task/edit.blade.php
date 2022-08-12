@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('datta-able/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('dist/plugins/jQueryUI/jquery-ui.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/invoice-style.min.css')}}">

@endsection
@section('content')
    <!-- Main content -->
{{-- <div class="col-sm-12" id="edit-task-container">
  <div class="card user-list">
    <div class="card-header">
      <h5><a href="{{ url('task/list') }}">{{ __('Task') }}</a> >> {{ __('Edit Task') }} #{{ $task->id }}</h5>
      <div class="card-header-right">

      </div>
    </div>
    <div class="card-block">
      <div class="form-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('Task Information') }}</a>
          </li>
          <li class="nav-item"></li>
        </ul>
      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <form class="form-horizontal" action="{{url('admin/project/task/edit/'. $task->id)}}" method="post" id="task_form">
            {{csrf_field()}}
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="task_id" id="task_id" value="{{ $task->id }}">
            <input type="hidden" name="source" value="{{ $menu }}">
            <div class="row">
              <div class="col-sm-10">
                <div class="form-group row">
                  <label for="task_name" class="col-sm-2 col-form-label require">{{ __('Subject') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="task_name" id="task_name" value="{{ $task->name }}">
                  </div>
                </div>

                <div class="form-group row" id="hourly_rate_div">
                  <label for="hourly_rate" class="col-sm-2 col-form-label require">{{ __('Hourly Rate') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control positive-float-number" name="hourly_rate" id="hourly_rate" value="{{ formatCurrencyAmount($task->hourly_rate) }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="start_date" class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                  <div class="col-sm-3">
                    <div class="input-group date p-md-0">
                      <div class="input-group-prepend">
                        <i class="fas fa-calendar-alt input-group-text"></i>
                      </div>
                      <input type="datetime-local" class="form-control" id="startDate" name="start_date" placeholder="Select date" value="{{ $task->start_date ? $task->start_date : '' }}">
                    </div>
                  </div>
                  <label for="dueDate" class="col-sm-2 col-form-label">{{ __('Due Date') }}</label>
                  <div class="col-sm-3">
                    <div class="input-group date p-md-0">
                      <div class="input-group-prepend">
                        <i class="fas fa-calendar-alt input-group-text"></i>
                      </div>
                      <input type="datetime-local" class="form-control" id="dueDate" name="due_date" placeholder="Select date" value="{{ $task->due_date ? formatDate($task->due_date) : '' }}">
                      <label for="due_date" generated="true" class="error" id="due_date-error"></label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="related_to" class="col-sm-2 col-form-label">{{ __('Related To') }}</label>
                  <div class="col-sm-3">
                    <select class="js-example-basic-single form-control" name="related_to" id="related_to">
                      <option {{ $task->related_to_type == '' ? 'selected' : '' }} value="">{{ __('Nothing Selected') }}</option>
                      <option {{ $task->related_to_type == '1' ? 'selected' : '' }} value="1">{{ __('Project') }}</option>
                      <option {{ $task->related_to_type == '2' ? 'selected' : '' }} value="2">{{ __('Customer') }}</option>
                      <option {{ $task->related_to_type == '3' ? 'selected' : '' }} value="3">{{ __('Ticket') }}</option>
                    </select>
                  </div>
                  <label id="related_to-error" class="error no-display" for="related_to">{{ __('This field is required.') }}</label>

                  <label for="priority" class="col-sm-2 col-form-label">{{ __('Priority') }}</label>
                    <div class="col-sm-3">
                      <select class="js-example-basic-single form-control" name="priority_id" id="priority">
                      @foreach($priorities as $data)
                        <option <?= $data->id == $task->priority_id ? 'selected' : '' ?> value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                      </select>
                    </div>
                </div>
                <input type="hidden" name="chargeType" id="chargeType" value="{{ $task->charge_type }}">
                <div class="form-group row" id="showPrevious">
                  <label class="col-sm-2 col-form-label require">
                    @if ($task->related_to_type == 1)
                      {{ __('Project') }} {{ __('Name') }}
                    @elseif ($task->related_to_type == 2)
                      {{ __('Customer') }} {{ __('Name') }}
                    @else
                      {{ __('Ticket') }}
                    @endif
                  </label>

                  <div class="col-sm-8">
                    <p><span class="" style="color: black">{{ $relatedName }}<i class="fa fa-times ml-2 cursor_pointer" title="{{ __('Remove') }}" onclick="javascript: autoCompleteRefresh()"></i></span><input type="hidden" name="relatedTo" value="{{ $task->related_to_type }}"><input type="hidden" name="relatedId" value="{{ $task->related_to_id }}"></p>
                  </div>
                </div>

                <div class="form-group row display_none" id="addRelatedTo">
                  <label class="col-sm-2 col-form-label searchSpan require"></label>
                  <div class="col-sm-8" id="relatedToDiv">
                      <input class="form-control auto col-sm-12" placeholder="{{ __('Search') }}" id="search">
                      <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="no_div" tabindex="0">
                          <li>{{ __('No record found')  }} </li>
                      </ul>
                  </div>
              </div>

              <div class="form-group row" id="milestone_div">
                  <label for="task_name" class="col-sm-2 col-form-label">{{ __('Milestone') }}</label>
                  <div class="col-sm-8">
                    <select class="js-example-basic-single form-control" id="milestone" name="milestone_id">
                      <option value="">{{ __('Select One') }}</option>
                      @foreach($milestones as $data)
                        <option <?= $data->id == $task->milestone_id ? 'selected' : '' ?> value="{{ $data->id }}">{{ $data->name }}</option>>
                      @endforeach
                    </select>
                  </div>
                </div>

                @if($menu == 'task')
                <div class="form-group row">
                  <label class="col-sm-2 control-label">{{ __('Assignee') }}</label>
                  <div class="col-sm-6">
                    <select class="form-control w-100 select2" name="assignee[]" id="assignee" multiple>
                      @foreach($assignees as $key=>$user)
                      <option value="{{ $user->id }}" {{ in_array($user->id, $task_assignee)?'selected':''}}>{{ $user->full_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <a id="assign_me">{{ __('Assign me') }}</a>
                  </div>
                  <input type="hidden" name="checkAssignMe" value="{{ in_array(Auth::guard('admin')->user()->id, $task_assignee) }}" id="checkAssignMe">
                </div>
                @endif

                <div class="form-group row">
                  <label for="tags" class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                  <div class="col-sm-8">
                    <select class="js-example-responsive select2" multiple="multiple" id="tags" name="tags[]">
                    @foreach ($tags as $value)
                      <option selected="selected" value="{{ $value->tag->name }}">{{ $value->tag->name }}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <!-- Checklist  starts-->
                <div class="form-group row">
                  <label for="myInput" class="col-sm-2 control-label">{{ __('Checklist') }}</label>
                  <div class="col-sm-8">
                    <div id="checkListDiv">
                      <div class="flexContainer">
                        <input type="text" id="myInput" class="form-control">
                        <span id="checklistAddBtn" class="checklistAddBtn">
                          <i class="fa fa-plus-square"></i>
                        </span>
                      </div>
                    </div>
                    @if($menu == 'task')
                    <div id="listHolderDiv" name="listHolderDiv">
                      <ul id="myUL" name="myUL">
                        @foreach ($checklist_items as $checklist_item)
                          <li class='checkbox checkbox-primary'>
                            <input type='checkbox' name='todo-item-done' class='todo-item-done' id="checklist_status_{{$checklist_item->id}}" value='{{$checklist_item->title}}' {{ $checklist_item->is_checked == 1 ? "checked" : "" }} />
                            <label for="checklist_status_{{$checklist_item->id}}" class="cr f-12">
                            <span class="checklist_label {{ $checklist_item->is_checked == 1 ? 'strike' : '' }} cursor_text" data-id="{{$checklist_item->id}}" title="Click to edit">{{$checklist_item->title}}</span></label>
                            <span class='todo-item-delete text-c-red f-18' id='{{ $checklist_item->id }}'><i class='feather icon-trash-2'></i></span>
                          </li>
                        @endforeach
                      </ul>
                      <div id="checklistCollector" name="checklistCollector">
                        @foreach ($checklist_items as $checklist_item)
                        <input type="hidden" name="allCheckListHiidenInput[]" value='{{$checklist_item->title}}'>
                        @endforeach
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
                <!-- Checklist  Ends-->
                <div class="form-group row">
                  <label class="col-sm-2 control-label">{{ __('Status') }}</label>
                  <div class="col-sm-8">
                    <select id="status" name="status_id" class="form-control">
                      @foreach($task_statuses as $key => $value)
                        <option <?= $key == $task->task_status_id ? 'selected': '' ?> value="{{ $key  }}">{{ $value }}</option>>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 control-label require">{{ __('Task Details') }}</label>
                  <div class="col-sm-8">
                    <textarea name="task_details" class="text-editor form-control" id="task_details">{{ $task->description }}</textarea>
                  </div>
                </div>


              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@foreach($errors->all() as $error)
{{$error}}
@endforeach
<div class="row">
  <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h5><a href="{{ url('task/list') }}">{{ __('Task') }}</a> >> {{ __('Edit Task') }} #{{ $task->id }}</h5>
          <div class="card-header-right">
    
          </div>
        </div>
        <form class="form-horizontal" action="{{url('admin/project/task/edit/'. $task->id)}}" method="post" id="task_form">
          {{csrf_field()}}
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          <input type="hidden" name="task_id" id="task_id" value="{{ $task->id }}">
          <input type="hidden" name="source" value="{{ $menu }}">
          <div class="card-body">  
              <div class="row">
                  <div class="col-lg-6">
                      <div class="mb-3 row">
                          <label for="example-text-input" class="col-sm-2 col-form-label text-end">Task name</label>
                          <div class="col-sm-10">
                              <input class="form-control" type="text" value="{{$task->name}}" name="task_name" id="task_name">
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="example-email-input" class="col-sm-2 col-form-label text-end">Hourly rate</label>
                          <div class="col-sm-10">
                              <input class="form-control" type="text" name="hourly_rate" id="hourly_rate" value="{{ formatCurrencyAmount($task->hourly_rate) }}">
                          </div>
                      </div> 
                      <div class="mb-3 row">
                          <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Start Date</label>
                          <div class="col-sm-10">
                              <input class="form-control" type="datetime-local" id="startDate" name="start_date" placeholder="Select date" value="{{ $task->start_date ? $task->start_date : '' }}">
                          </div>
                      </div> 
                      <div class="mb-3 row">
                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Due Date</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="datetime-local"  id="dueDate" name="due_date" placeholder="Select date" value="{{ $task->due_date ? formatDate($task->due_date) : '' }}">
                        </div>
                    </div> 

                      <div class="mb-3 row">
                        <label for="related_to" class="col-sm-2 col-form-label">{{ __('Related To') }}</label>
                        <div class="col-sm-3">
                          <select class=" form-control" name="related_to" id="related_to">
                            <option {{ $task->related_to_type == '' ? 'selected' : '' }} value="">{{ __('Nothing Selected') }}</option>
                            <option {{ $task->related_to_type == '1' ? 'selected' : '' }} value="1">{{ __('Project') }}</option>
                            <option {{ $task->related_to_type == '2' ? 'selected' : '' }} value="2">{{ __('Customer') }}</option>
                            <option {{ $task->related_to_type == '3' ? 'selected' : '' }} value="3">{{ __('Ticket') }}</option>
                          </select>
                        </div>
                      </div>
                      <div class="mb-3 row">

                        <label for="priority" class="col-sm-2 col-form-label">{{ __('Priority') }}</label>
                        <div class="col-sm-3">
                          <select class="form-control" name="priority_id" id="priority">
                          @foreach($priorities as $data)
                            <option <?= $data->id == $task->priority_id ? 'selected' : '' ?> value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="mb-3 row">
                          <input type="hidden" name="chargeType" id="chargeType" value="{{ $task->charge_type }}">
                          <div class="form-group row" id="showPrevious">
                            <label class="col-sm-2 col-form-label require">
                              @if ($task->related_to_type == 1)
                                {{ __('Project') }} {{ __('Name') }}
                              @elseif ($task->related_to_type == 2)
                                {{ __('Customer') }} {{ __('Name') }}
                              @else
                                {{ __('Ticket') }}
                              @endif
                            </label>
          
                            <div class="col-sm-8">
                              <p><span class="badge" style="color: black">{{ $relatedName }}<i class="fa fa-times ml-2 cursor_pointer" title="{{ __('Remove') }}" onclick="javascript: autoCompleteRefresh()"></i></span><input type="hidden" name="relatedTo" value="{{ $task->related_to_type }}"><input type="hidden" name="relatedId" value="{{ $task->related_to_id }}"></p>
                            </div>
                          </div>
                      </div>   
                              
                  </div>


                  <div class="col-lg-6">                                       
                      <div class="mb-3 row">
                        <label for="task_name" class="col-sm-2 col-form-label">{{ __('Milestone') }}</label>
                        <div class="col-sm-10">   
                                <select class="js-example-basic-single form-control" id="milestone" name="milestone_id">
                                  <option value="">{{ __('Select One') }}</option>
                                  @foreach($milestones as $data)
                                    <option <?= $data->id == $task->milestone_id ? 'selected' : '' ?> value="{{ $data->id }}">{{ $data->name }}</option>>
                                  @endforeach
                                </select>
                             </div>
                      </div> 
                      <div class="mb-3 row">
                        @if($menu == 'task')
                        <div class="form-group row">
                          <label class="col-sm-2 control-label">{{ __('Assignee') }}</label>
                          <div class="col-sm-6">
                            <select class="form-control w-100  select2" name="assignee[]" id="assignee" multiple>
                              @foreach($assignees as $key=>$user)
                              <option value="{{ $user->id }}" {{ in_array($user->id, $task_assignee)?'selected':''}}>{{ $user->full_name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-sm-3">
                            <a id="assign_me">{{ __('Assign me') }}</a>
                          </div>
                          <input type="hidden" name="checkAssignMe" value="{{ in_array(Auth::guard('admin')->user()->id, $task_assignee) }}" id="checkAssignMe">
                        </div>
                        @endif
                      </div>
                      <div class="mb-3 row">
                        <label for="tags" class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                          <div class="col-sm-10">
                            <div class="col-sm-8">
                              <select class="form-control select2" multiple="multiple" id="tags" name="tags[]">
                              @foreach ($tags as $value)
                                <option selected="selected" value="{{ $value->tag->name }}">{{ $value->tag->name }}</option>
                              @endforeach
                            </select>
                            </div>
                            </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="myInput" class="col-sm-2 control-label">{{ __('Checklist') }}</label>
                        <div class="col-sm-10">
                            <div class="col-sm-8">
                              <div id="checkListDiv">
                                <div class="flexContainer">
                                  <input type="text" id="myInput" class="form-control">
                                  <span id="checklistAddBtn" class="checklistAddBtn">
                                    <i class="fa fa-plus-square"></i>
                                  </span>
                                </div>
                              </div>
                              @if($menu == 'task')
                              <div id="listHolderDiv" name="listHolderDiv">
                                <ul id="myUL" name="myUL">
                                  @foreach ($checklist_items as $checklist_item)
                                    <li class='checkbox checkbox-primary'>
                                      <input type='checkbox' name='todo-item-done' class='todo-item-done' id="checklist_status_{{$checklist_item->id}}" value='{{$checklist_item->title}}' {{ $checklist_item->is_checked == 1 ? "checked" : "" }} />
                                      <label for="checklist_status_{{$checklist_item->id}}" class="cr f-12">
                                      <span class="checklist_label {{ $checklist_item->is_checked == 1 ? 'strike' : '' }} cursor_text" data-id="{{$checklist_item->id}}" title="Click to edit">{{$checklist_item->title}}</span></label>
                                      <span class='todo-item-delete text-c-red f-18' id='{{ $checklist_item->id }}'><i class='feather icon-trash-2'></i></span>
                                    </li>
                                  @endforeach
                                </ul>
                                <div id="checklistCollector" name="checklistCollector">
                                  @foreach ($checklist_items as $checklist_item)
                                  <input type="hidden" name="allCheckListHiidenInput[]" value='{{$checklist_item->title}}'>
                                  @endforeach
                                </div>
                              </div>
                              @endif
                            </div>
                            </div>
                      </div>
                      <div class="mb-3 row">
                        <label class="col-sm-2 control-label">{{ __('Status') }}</label>
                        <div class="col-sm-10">
                            <div class="col-sm-8">
                              <select id="status" name="status_id" class="form-control">
                                @foreach($task_statuses as $key => $value)
                                  <option <?= $key == $task->task_status_id ? 'selected': '' ?> value="{{ $key  }}">{{ $value }}</option>>
                                @endforeach
                              </select>
                            </div>
                              </div>
                      </div>
                                                           
                  </div>
              </div>
              <div class="mb-3 row has-success">
                <label class="col-sm-2 control-label require">{{ __('Task Details') }}</label>
                <div class="col-sm-10">
                    <div class="col-sm-8">
                      <textarea name="task_details" class="text-editor form-control" id="task_details">{{ $task->description }}</textarea>
                    </div>
                  </div>
              </div>  
              <div class="col-sm-8 px-0 mt-2">
                <button class="btn btn-primary custom-btn-small" type="submit" id="btnSubmit">{{ __('Update') }}</button>
                <a href="{{ url('admin/project/task/view') }}" class="btn btn-danger custom-btn-small">{{ __('Cancel') }}</a>
              </div>                                                                     
          </div><!--end card-body-->

        </form>
      </div><!--end card-->
  </div><!--end col-->
</div><!--end row-->

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
<script src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dist/js/moment.min.js') }}"></script>
<script src="{{ asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('datta-able/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('dist/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
{!! translateValidationMessages() !!}
<script type="text/javascript">
    'use strict';
    var loggedUserId = '{{ Auth::guard('admin')->user()->id }}';
</script>
<script src="{{ asset('dist/js/custom/task.min.js') }}"></script>
@endsection
