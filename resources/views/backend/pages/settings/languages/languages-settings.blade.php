@extends('backend.pages.settings.settings')

@section('card-header-settings')
    Languages
@endsection

@section('settings-content')
<div class="table-responsive">
    <table class="table mb-0 table-centered" >
        <thead>
        <tr>
            <th>Languages name</th>
            <th>Short name</th>
            <th>Flag</th>
            <th>Status</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        @foreach ($data as $language) 
        <tbody>
        <tr>
            <td>
                {{$language->name}}
            </td>
            <td>{{$language->short_name}}</td>
            <td><img src="{{URL::asset('')}}assets/images/small/project-1.jpg" alt="" class="rounded-circle thumb-xs me-1"></td>
            <td>
                <div class="form-check form-switch form-switch-success">
                <input class="form-check-input" type="checkbox" id="customSwitchSuccess" checked>
                <label class="form-check-label" for="customSwitchSuccess">{{$language->status}}</label>
            </div>
        </td>
            <td class="text-end">
                <a href="edit-language/{{$language->id}}" data-toggle="modal" data-target="#editlanguage" ><i class="las la-pen text-secondary font-16"></i></a>
                <a href="" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table><!--end /table-->
    {{$data->links()}}
    <div class="col">
        <a href="{{route('admin.createlanguage')}}"><button class="btn btn-outline-light btn-sm px-4 ">+ Add New</button></a>

    </div><!--end col-->   
</div><!--end /tableresponsive-->
@endsection