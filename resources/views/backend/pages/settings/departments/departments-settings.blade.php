@extends('backend.pages.settings.settings')



@section('settings-content')
  
                    <h4 class="card-title">Departments</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->

                <a href="{{ route('admin.create-department') }}"><button class="btn btn-primary btn-sm px-4 ">+ Add New</button></a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Departement</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data  as $Departements)
                                    <tr>
                                        <td> {{$Departements->name}}</td>
                                        <td><a href="edit-departments/{{$Departements->id}}" value="{{$Departements->id}}"><i class="las la-pen text-secondary font-16"></i></a>&nbsp;
                                        <a href="delete-departments/{{$Departements->id}}" value="{{$Departements->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->

       
   
@endsection