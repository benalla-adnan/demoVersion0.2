@extends('backend.pages.settings.settings')



@section('settings-content')
  
                    <h4 class="card-title">Priorites</h4>
                    <p class="text-muted mb-0">
                    </p>
                    <a href="{{ url('admin/create-priority') }}"><button class="btn btn-primary btn-sm px-4 ">+ Add New</button></a>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Priority Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data  as $priorities)
                                    <tr>
                                        <td> {{$priorities->name}}</td>
                                        <td><a href="edit-priority/{{$priorities->id}}" value="{{$priorities->id}}"><i class="las la-pen text-secondary font-16"></i></a>&nbsp;
                                            <a href="delete-priority/{{$priorities->id}}" value="{{$priorities->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->

       
   
@endsection