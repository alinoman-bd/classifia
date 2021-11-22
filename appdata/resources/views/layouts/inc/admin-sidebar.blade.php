    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false"> 
                            <img src="{{asset('assets/back-assets/assets/images/users/1.jpg')}}" class="rounded-circle ml-2" width="30"> <span class="hide-menu">
                                @php 
                                $user_name = Auth::User()->name;
                                echo ucwords($user_name);
                                @endphp
                            </span> 
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"> <i class="ti-user"></i> <span class="hide-menu"> My Profile </span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"> <i class="ti-wallet"></i> <span class="hide-menu"> My Balance </span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"> <i class="ti-email"></i> <span class="hide-menu"> Inbox </span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"> <i class="ti-settings"></i> <span class="hide-menu"> Account Setting </span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"> <i class="fas fa-power-off"></i> <span class="hide-menu"> Logout </span> </a>
                            </li>
                        </ul>
                    </li>                    
                    <div class="devider"></div>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="fa fa-list-alt"></i> <span class="hide-menu text-uppercase">categories</span> <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1">3</span> </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{route('category')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu text-capitalize">Main categories</span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('subCategory')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu text-capitalize"> sub Categories </span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('innerSubCategory')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu text-capitalize"> inner sub category </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('thirdInnerCategory')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu text-capitalize"> 3rd inner category </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <div class="devider"></div>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="fa fa-images"></i> <span class="hide-menu text-uppercase">Manage Sliders</span> <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1">2</span> </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{route('sliderOne')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu text-capitalize">Slider one</span> </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('sliderTwo')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu text-capitalize">Slider Two </span> </a>
                            </li>
                        </ul>
                    </li>
                    <div class="devider"></div>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('allAdvertisement')}}" aria-expanded="false">
                            <i class="fa fa-clipboard"></i>
                            <span class="hide-menu">Advertisement</span>
                        </a>
                    </li>
                    <div class="devider"></div>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('allUser')}}" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>                    
                    <div class="devider"></div>
                   <!--  <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('termsCond')}}" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="hide-menu">Terms & Condition </span>
                        </a>
                    </li>                    
                    <div class="devider"></div> -->
                    @if(Auth::User()->role)
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/registration-form') }}" aria-expanded="false">
                            <i class="fa fa-user-plus"></i>
                            <span class="hide-menu text-uppercase">Register A user</span>
                        </a>
                    </li>
                    <div class="devider"></div> -->
                    @endif
                </ul>
            </nav>
        </div>
    </aside>