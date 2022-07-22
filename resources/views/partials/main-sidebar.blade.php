    <div class="left-sidebar">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">

                </span>
            </a>
        </div>
        <div class="sidebar-user-pro media border-end">                    
            <div class="position-relative mx-auto">
                <img src="{{URL::asset('assets/images/users/user-4.jpg')}}" alt="user" class="rounded-circle thumb-md">
                <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
            </div>
            <div class="media-body ms-2 user-detail align-self-center">
                <h5 class="font-14 m-0 fw-bold">{{$usr->name}}</h5>  
                <p class="opacity-50 mb-0">{{$usr->email}}</p>            
            </div>                    
        </div>
        <div class="border-end">
            <ul class="nav nav-tabs menu-tab nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Main" role="tab" aria-selected="true">M<span>ain</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#Extra" role="tab" aria-selected="false">E<span>xtra</span></a>
                </li>
            </ul>
        </div>
        <!-- Tab panes -->

        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <div class="menu-body navbar-vertical">
                <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                        <li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span><br><span class="font-10 text-secondary fw-normal">Unique Dashboard</span></li>                    
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAnalytics">
                                <i class="ti ti-stack menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                            <div class="collapse " id="sidebarAnalytics">
                                <ul class="nav flex-column">
                                    @if ($usr->can('dashboard.view'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                                    </li><!--end nav-item-->
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{route('admin.lead')}}" class="nav-link ">Lead</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a href="{{route('admin.project')}}" class="nav-link ">Projects</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end sidebarAnalytics-->
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarSettings">
                                <i class="mdi mdi-settings menu-icon"></i>
                                <span>Settings</span>
                            </a>
                            <div class="collapse " id="sidebarSettings">
                                <ul class="nav flex-column">
                                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.roles.index') }}">Role</a>
                                    </li><!--end nav-item-->
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.admins.index') }}">Permission</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end sidebarCrypto-->
                        </li><!--end nav-item-->



                </div><!--end sidebarCollapse-->
            </div>
        </div>    
    </div>