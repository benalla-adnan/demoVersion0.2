@extends('backend.pages.settings.settings')

@section('card-header-settins')
    Currencies
@endsection

@section('settings-content')

 
<div class="table-responsive">
    <table class="table mb-0 table-centered" >
        <thead>
        <tr>
            <th>Currencies name</th>
            <th>Symbol</th>
            <th>Rate</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        @foreach ($data as $currency)
        <tbody>
        <tr>
            <td>
                {{$currency->name}}   
            </td>
            <td>{{$currency->symbol}} </td>
            <td>{{number_format((float)$currency->exchange_rate,2,'.','')}}</td>

            <td class="text-end">
                <a href="edit-currencie/{{$currency->id}}" data-toggle="modal" data-target="#editlanguage" ><i class="las la-pen text-secondary font-16"></i></a>
                <a href="delete-currency/{{$currency->id}}" class="mr-2"><i class="las la-trash-alt text-secondary font-16"></i></a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table><!--end /table-->
    {{$data->links()}}
    <div class="col">
        <a href="{{route('admin.createcurrencies')}}"><button class="btn btn-outline-light btn-sm px-4 ">+ Add New</button></a>

    </div><!--end col-->   
</div><!--end /tableresponsive-->
@endsection