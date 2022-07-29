@extends('layouts.master')

@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Lead
@endsection

@section('title_page2')
    Lead
@endsection
@section('content')
<div class="col">
    <a href="{{route('admin.create')}}"><button class="btn btn-outline-light btn-sm px-4 ">+ Add New</button></a>

    <form action="export" method="get">
        
        <a href="export">Export Data</a>
    </form>
   
   

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>zip_code</th>
                            <th>phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        @foreach ($datas as $data)
                        <tbody>
                        <tr>
                            <td>
                                <img src="{{URL::asset('assets/images/products/04.png')}}" alt="" height="40">
                                <p class="d-inline-block align-middle mb-0">
                                    <a href="lead-details/{{$data->id}}" class="d-inline-block align-middle mb-0 product-name fw-semibold">{{$data->first_name}} {{$data->last_name}}</a> 
                                    <br>
                                    <span class="text-muted font-13 fw-semibold">{{$data->email}} ({{$data->created_at}})</span> 
                                </p>
                            </td>
                            <td>{{$data->zip_code}}</td>
                            <td>{{$data->phone}}</td>
                             <td>                                                       
                                <a href="edit/{{$data->id}}" value="{{$data->id}}"><i class="las la-pen text-secondary font-16"></i></a>
                                <a href="delete-lead/{{$data->id}}" value="{{$data->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div> 
                <div class="row">
<<<<<<< HEAD
                       
=======
                    <div class="col">
                        <a href="{{url('create-lead')}}"><button class="btn btn-outline-light btn-sm px-4 ">+ Add New</button></a>
       
                    </div><!--end col-->      
>>>>>>> 84ac2b614cb755567f0c20428b070b6536738a1e
                    <div class="col-auto">
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul><!--end pagination-->
                        </nav><!--end nav-->       
                     </div> <!--end col-->                               
                </div><!--end row-->       
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div> <!-- end row -->
<form action="import">
<div>
    <input type="file">
    <button type="submit">Import</button>
</div>
</form>
@endsection

