@extends('backend.pages.settings.settings')

@section('card-header-settings')
Add Currency
@endsection

@section('settings-content')
<form action="add-currencie" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="symbol">Symbol</label>
                <input type="text" class="form-control" id="symbol" name="symbol" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="exchange_rate">Exchange rate</label>
                <input type="number" class="form-control" id="exchange_rate" name="exchange_rate" required="">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">                            
            <div class="mb-3">
                <label class="visually-hidden" for="exchange_from">Exchange from</label>
                <select class="form-select" id="exchange_from" name="exchange_from">
                  <option selected>Choose...</option>
                  <option value="1">local</option>
                  <option value="2">api</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-end">
            <button type="submit" class="btn btn-de-primary px-4">Submit</button>
        </div>
    </div>
</form>
@endsection