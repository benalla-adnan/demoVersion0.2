@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="met-profile">
                    <div class="row">
                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                            <div class="met-profile-main">
                                <div class="met-profile-main-pic">
                                    <img src="{{asset('assets/images/users/user-4.jpg')}}" alt="" height="110" class="rounded-circle">
                                    <span class="met-profile_main-pic-change">
                                        <i class="fas fa-camera"></i>
                                    </span>
                                </div>
                                <div class="met-profile_user-detail">
                                    <h5 class="met-user-name">{{$data->name}}</h5>                                                        
                                    <p class="mb-0 met-user-name-post">{{trim($data->getRoleNames(),'[]""')}}</p>                                                        
                                </div>
                            </div>                                                
                        </div><!--end col-->
                        
                        <div class="col-lg-4 ms-auto align-self-center">
                            <ul class="list-unstyled personal-detail mb-0">
                                <li class=""><i class="las la-phone mr-2 text-secondary font-22 align-middle"></i> <b> phone </b> : +91 23456 78910</li>
                                <li class="mt-2"><i class="las la-envelope text-secondary font-22 align-middle mr-2"></i> <b> Email </b> : {{$data->email}}</li>
                                <li class="mt-2"><i class="las la-globe text-secondary font-22 align-middle mr-2"></i> <b> Website </b> : 
                                    <a href="https://mannatthemes.com/" class="font-14 text-primary">https://crmproject .com/</a> 
                                </li>                                                   
                            </ul>
                           
                        </div><!--end col-->
                        <div class="col-lg-4 align-self-center">
                            <div class="row">
                                <div class="col-auto text-end border-end">
                                    <button type="button" class="btn btn-soft-primary btn-icon-circle btn-icon-circle-sm mb-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <p class="mb-0 fw-semibold">Facebook</p>
                                    <h4 class="m-0 fw-bold">25k <span class="text-muted font-12 fw-normal">Followers</span></h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    <button type="button" class="btn btn-soft-info btn-icon-circle btn-icon-circle-sm mb-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <p class="mb-0 fw-semibold">Twitter</p>
                                    <h4 class="m-0 fw-bold">58k <span class="text-muted font-12 fw-normal">Followers</span></h4>
                                </div><!--end col-->
                            </div><!--end row-->                                               
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end f_profile-->                                                                                
            </div><!--end card-body-->  
            <div class="card-body p-0">    
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">                                              
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab" aria-selected="false">Settings</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">                                              
                    <div class="tab-pane p-3" id="Settings" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Personal Information</h4>                      
                                            </div><!--end col-->                                                       
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body">                       
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">First Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="Rosa">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="Dodson">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Company Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="MannatThemes">
                                                <span class="form-text text-muted font-12">We'll never share your email with anyone else.</span>
                                            </div>
                                        </div>
            
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Contact Phone</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="las la-phone"></i></span>
                                                    <input type="text" class="form-control" value="+123456789" placeholder="Phone" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email Address</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="las la-at"></i></span>
                                                    <input type="text" class="form-control" value="rosa.dodson@demo.com" placeholder="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Website Link</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="la la-globe"></i></span>
                                                    <input type="text" class="form-control" value=" https://mannatthemes.com/" placeholder="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">USA</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <select class="form-select">
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>USA</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-de-primary">Submit</button>
                                                <button type="button" class="btn btn-de-danger">Cancel</button>
                                            </div>
                                        </div>                                                    
                                    </div>                                            
                                </div>
                            </div> <!--end col--> 
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Change Password</h4>
                                    </div><!--end card-header-->
                                    <div class="card-body"> 
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Current Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="Password">
                                                <a href="#" class="text-primary font-12">Forgot password ?</a>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">New Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Confirm Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="Re-Password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-de-primary">Change Password</button>
                                                <button type="button" class="btn btn-de-danger">Cancel</button>
                                            </div>
                                        </div>   
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Other Settings</h4>
                                    </div><!--end card-header-->
                                    <div class="card-body"> 

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="Email_Notifications" checked>
                                            <label class="form-check-label" for="Email_Notifications">
                                                Email Notifications
                                            </label>
                                            <span class="form-text text-muted font-12 mt-0">Do you need them?</span>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="API_Access">
                                            <label class="form-check-label" for="API_Access">
                                                API Access
                                            </label>
                                            <span class="form-text text-muted font-12 mt-0">Enable/Disable access</span>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->                                                                              
                        </div><!--end row-->
                    </div>
                </div>        
            </div> <!--end card-body-->                            
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection