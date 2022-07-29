@extends('backend.pages.settings.settings')

@section('card-header-settins')
   Add Lead Source
@endsection

@section('settings-content')
<form action="/admin/add-lead_source" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"  required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">                            
                <div class="mb-3">
                    <label class="visually-hidden" for="status">Status</label>
                    <select class="form-select" id="status" name="status">
                      <option>active</option>
                      <option>inactive</option>
                    </select>
                </div>
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