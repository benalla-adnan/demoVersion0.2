@extends('backend.pages.settings.settings')

@section('card-header-settins')
    Lead Source
@endsection
@section('settings-content')

 
<div class="table-responsive">
    <table class="table mb-0 table-centered" >
        <thead>
        <tr>
            <th>Lead Source name</th>
            <th>Status</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        @foreach ($data as $leadsource)
        <tbody>
        <tr>
            <td>
                {{$leadsource->name}}   
            </td>
            <td>{{$leadsource->status}}</td>

            <td class="text-end">
                <a href="edit-lead_source/{{$leadsource->id}}" ><i class="las la-pen text-secondary font-16"></i></a>
                <a href="delete-lead_source/{{$leadsource->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table><!--end /table-->
    {{$data->links()}}
    <div class="col">
        <a href="{{route('admin.createLeadSource')}}"><button class="btn btn-outline-light btn-sm px-4 ">+ Add New</button></a>

    </div><!--end col-->   
</div><!--end /tableresponsive-->
@endsection