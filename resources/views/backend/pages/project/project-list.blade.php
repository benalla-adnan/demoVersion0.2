@extends('backend.pages.project.project')
@section('title')
    CRM-pereine
@endsection
@section('title_page1')
Project
@endsection
@section('title_page2')
list project
@endsection
@section('content')
<div class="row">
@foreach ($projects as $project)
<?php
$time_left = floor((strtotime($project->due_date)-strtotime($project->begin_date))/86400);
?>
<div class="col-lg-4">
    <div class="card">
        <div class="card-body">                                        
            <div class="media mb-3">
                <img src="{{URL::asset('assets/images/small/project-2.jpg')}}" alt="" class="thumb-md rounded-circle">                                      
                <div class="media-body align-self-center text-truncate ms-2">                                            
                    <h4 class="m-0 fw-bold text-dark font-18">{{$project->project_name}}</h4>
                    <p class="text-muted  mb-0 font-13"><span class="text-dark" value="{{$project->id}}">Client : {{$project->first_name }} {{$project->last_name}}</span></p> 
                </div><!--end media-body-->
            </div>   
            <div class="d-flex justify-content-between">  
                <h6 class="fw-semibold">Start : <span class="text-muted font-weight-normal"> {{$project->begin_date}}</span></h6>
                <h6 class="fw-semibold">Deadline : <span class="text-muted font-weight-normal"> {{$project->due_date}}</span></h6>                          
            </div> 
            <div class="mt-3">
                <h5 class="font-16 fw-bold m-0">{{$project->cost}}</h5>
                <p class="mb-0 text-muted fw-semibold">Total Budget</p>                                        
            </div>
            <div> 
                <p class="text-muted mt-4 mb-1">{!!html_entity_decode($project->detail)!!}

                </p>
                <div class="d-flex justify-content-between">
                    <h6 class="fw-semibold">All Hours : <span class="text-muted font-weight-normal"> {{$project->estimated_hours}}</span></h6>
                    <h6 class="fw-semibold">Today : <span class="text-muted font-weight-normal"></span><span class="badge badge-soft-pink fw-semibold ms-2"><i class="far fa-fw fa-clock"></i> {{$time_left}} day left </span></h6>
                </div>
                <p class="text-muted text-end mb-1">{{$project->improvement}}% Complete</p>
                <div class="progress mb-4" style="height: 4px;">
                    <div class="progress-bar bg-purple" role="progressbar" style="width: {{$project->improvement}}%;" aria-valuenow="{{$project->improvement}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="img-group">
                        <a class="user-avatar" href="#">
                            <img src="{{URL::asset('assets/images/users/person.jpg')}}" alt="user" class="thumb-xs rounded-circle">
                        </a>
                        <a class="user-avatar ms-n3" href="#">
                            <img src="{{URL::asset('assets/images/users/person.jpg')}}" alt="user" class="thumb-xs rounded-circle">
                        </a>
                        <a class="user-avatar ms-n3" href="#">
                            <img src="{{URL::asset('assets/images/users/person.jpg')}}" alt="user" class="thumb-xs rounded-circle">
                        </a>
                        <a class="user-avatar ms-n3" href="#">
                            <img src="{{URL::asset('assets/images/users/person.jpg')}}" alt="user" class="thumb-xs rounded-circle">
                        </a>
                        <a href="" class="user-avatar">
                            <span class="thumb-xs justify-content-center d-flex align-items-center bg-soft-info rounded-circle fw-semibold">+6</span>
                        </a>                    
                    </div><!--end img-group--> 
                    <ul class="list-inline mb-0 align-self-center">                                                                    
                        <li class="list-item d-inline-block">
                            <a class="ms-2" href="#">
                                <i class="mdi mdi-pencil-outline text-muted font-18"></i>
                            </a>                                                                               
                        </li>
                        <li class="list-item d-inline-block">
                            <a class="" href="delete-project/{{$project->idP}}" value="{{$project->idP}}">
                                <i class="mdi mdi-trash-can-outline text-muted font-18"></i>
                            </a>                                                                               
                        </li>
                    </ul>
                </div>                                        
            </div><!--end task-box-->                                                                  
        </div><!--end card-body-->
    </div><!--end card-->
</div><!--end col-->
@endforeach
</div>

@endsection