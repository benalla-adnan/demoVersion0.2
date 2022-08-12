
@extends('backend.pages.settings.settings')
@section('title')
    CRM-pereine
@endsection

@section('title_page1')
    Languages
@endsection

@section('title_page2')
    Add Language
@endsection
@section('settings-content')



<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" action="{{ url('admin/edit-languages/'.$languages->id) }}" method="POST">
                @csrf
                <div class="col-md-4 position-relative">
                    <input type="hidden" value="{{ $languages->id }}" name="id" id="languages_id"> 
                  <label for="validationTooltip01" class="form-label">Language Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $languages->name }} ">
                  <div class="valid-tooltip">
                    
                  </div>
                </div>
                <div class="col-md-4 position-relative">
                  <label for="validationTooltip02" class="form-label">Short Name</label>
                  <input type="text" class="form-control" id="short_name" name="short_name" placeholder="Enter Short Name" value="{{ $languages->short_name }}">
                  <div class="valid-tooltip">
                    
                  </div>
                </div>
              
                <div class="col-md-3 position-relative">
                  <label for="validationTooltip04" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required>
                    <option selected disabled value="">Choose...</option>
                    <option ++9>Active</option>
                    <option >Inactive</option>
                  </select>
                  
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip04" class="form-label">Is default</label>
                    <select class="form-select" id="is_default" name="is_default"required>
                        <option selected disabled value="">Choose...</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    
                <div class="col-12">
                    <br>
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form><!--end form-->                                      
        </div><!--end card-body-->
    </div><!--end card-->
</div><!--end col-->


@endsection