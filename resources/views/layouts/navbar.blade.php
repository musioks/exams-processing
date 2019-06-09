<header id="topnav" class="topbar-light">
    <nav class="navbar-custom" style="background: #404e67;">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <li class="dropdown notification-list"><a class="nav-link dropdown-toggle nav-user"
                                                      data-toggle="dropdown" href="#" role="button"
                                                      aria-haspopup="false" aria-expanded="false">
                    @if(Auth::user()->avatar=='')
                        <img src="{{asset('/assets/images/users/user.jpg')}}" alt="user" class="rounded-circle">
                    @else
                        <img src="{{asset('/assets/images/users/'.Auth::user()->avatar)}}" alt="user"
                             class="rounded-circle">
                    @endif
                    <span class="ml-1 text-white">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown"><!-- item-->
                    <!-- item--> <a href="{{url('/main/profile')}}" class="dropdown-item notify-item"><i
                            class="fa fa-fw fa-user"></i> <span>My Profile</span> </a><!-- item--> <a
                        href="{{url('/main/password')}}" class="dropdown-item notify-item"><i
                            class="fa fa-fw fa-gear"></i> <span>Change Password</span> </a><!-- item-->

                    <a href="{{ url('signout') }}" class="dropdown-item notify-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-power-off"></i> <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ url('signout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
        <ul class="list-unstyled menu-left mb-0">
            <li class="float-left border-bottom "><a href="{{url('/main')}}" class="logo ">
              <span class="logo-lg">
<img src="{{asset('assets/images/logo22.PNG')}}" alt="" style="width:68px;height:68px;">
              </span>
                    <img class="logo-sm" style="width:68px;height:68px;" src="{{asset('assets/images/logo22.PNG')}}"
                         alt=""></a></li>
            <li class="float-left"><a class="button-menu-mobile open-left navbar-toggle">
                    <div class="lines text-white"><span></span> <span></span> <span></span></div>
                </a></li>
            <div class="mobile-display">
                <li class="float-left mt-1 p-2 clearfix text-white ">
                    <a href="#" class="text-white"><img src="{{asset('assets/images/call.png')}}" class="mr-2" alt=""
                                                        height="28">+254700113890</a>
                    &nbsp;<a href="#" class="text-white"><img src="{{asset('assets/images/mail.png')}}" class="mr-2"
                                                               alt="" height="28">feedback@exams-system.io</a>
                </li>

            </div>

        </ul>
    </nav>
    <!-- end navbar-custom -->
</header>
