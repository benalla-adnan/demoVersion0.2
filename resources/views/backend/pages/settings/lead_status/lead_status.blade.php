@extends('backend.pages.settings.settings')

@section('card-header-settins')
    Lead Status
@endsection
@section('css')
<style>
.lead_status_color {
    height: 25px;
    width: 25px;
    margin: 5px;
    display: inline-block;
}
</style>
@endsection

@section('settings-content')

<div class="col">
    <a href="{{route('admin.createLeadStatus')}}"><button class="btn btn-primary btn-sm px-4 ">+ Add New</button></a>

</div><!--end col-->   
<div class="table-responsive">
    <table class="table mb-0 table-centered" >
        <thead>
        <tr>
            <th>Lead status name</th>
            <th>Color</th>
            <th>Status</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        @foreach ($data as $leadstatus)
        <tbody>
        <tr>
            <td>
                {{$leadstatus->name}}   
            </td>
            <td><div class="lead_status_color" style="background-color: {{$leadstatus->color}}"></div></td>
            <td>{{$leadstatus->status}}</td>

            <td class="text-end">
                <a href="edit-lead_status/{{$leadstatus->id}}" ><i class="las la-pen text-secondary font-16"></i></a>
                <a href="delete-lead_status/{{$leadstatus->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table><!--end /table-->
    {{$data->links()}}

</div><!--end /tableresponsive-->
@endsection