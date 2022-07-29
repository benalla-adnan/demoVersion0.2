@extends('backend.pages.settings.settings')

@section('card-header-settings')
Add language
@endsection

@section('settings-content')
<form action="/add-language" method="">
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="useremail">Short Name</label>
                <input type="email" class="form-control" id="useremail" required="">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">                            
            <div class="mb-3">
                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                <select class="form-select" id="inlineFormSelectPref">
                  <option selected>Choose...</option>
                  <option value="1">Actie</option>
                  <option value="2">Inactive</option>
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