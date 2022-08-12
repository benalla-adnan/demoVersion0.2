@extends('backend.pages.settings.settings')



@section('settings-content')


  
                    <h4 class="card-title">Languages</h4>
                    <p class="text-muted mb-0">
                    </p>
                    <a href="{{ url('admin/create-language') }}"><button class="btn btn-primary btn-sm px-4 ">+ Add New</button></a>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Flag</th>
                                <th>Language Name</th>
                                <th>Short Name</th>
                                <th>Status</th>
                                <th>Action</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data  as $languages)
                                    <tr>
                                        <td>
                                            <img src='{{ URL::asset("assets/images/lang-flags/4x3/" . ($languages->short_name) . ".svg") }}' width="32">
                                        </td>
                                        <td> {{$languages->name}}</td>
                                        <td>{{$languages->short_name}}</td>
                                        <td>{{$languages->status}}</td>
                                        <td><a href="{{ url('admin/edit-languages/'.$languages->id) }}" value="{{$languages->id}}"><i class="las la-pen text-secondary font-16"></i></a>&nbsp;
                                            <a href="delete-languages/{{$languages->id}}" value="{{$languages->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a></td>
                                    </tr>
                                @endforeach
                      
                        
                      
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->

       
   

@endsection