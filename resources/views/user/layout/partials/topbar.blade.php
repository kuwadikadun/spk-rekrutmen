<!--**********************************
            Nav header start
        ***********************************-->
        {{-- <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ url('/') }}">
                    <b class="logo-abbr"><img src="{{ asset('assets/img/bpbdkabserang.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('./assets/img/bpbdkabserang.png') }}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('assets/img/bpbdkabserang.png') }}" alt="" width="54px" height="80px" style="margin-left: 20px; margin-top:-20px">
                    </span>
                </a>
            </div>
        </div> --}}
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        {{-- <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix"> --}}
                        {{-- <li class="icons dropdown"> --}}
                            {{-- @auth
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                Welcome, {{ auth()->user()->name }}
                                
                                <h6 class="mb-0 mt-5 text-gray-600">Welcome, {{auth()->user()->name}}</h6>
                             
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="{{ url('/logout') }}"><i class=""></i> <span>Logout</span></a></li>
                                    </ul>
                                    <form action="/logout/pelamar" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="icon-key"></i> Log Out</button>
                                      </form>
                                </div>
                            </div>
                        @endauth --}}
                        {{-- </li> --}}

                  
                    {{-- </ul>
                </div>
            </div>
        </div> --}}
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ url('/') }}">
                    <b class="logo-abbr"><img src="{{ asset('assets/img/bpbdkabserang.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('./assets/img/bpbdkabserang.png') }}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('assets/img/bpbdkabserang.png') }}" alt="" width="70px" style="margin-top: -20px; margin-left: 50px">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        {{-- <li class="icons dropdown"> --}}
                            @auth
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                {{-- Welcome, {{ auth()->user()->name }} --}}
                                
                                <h6 class="mb-0 mt-5 text-gray-600">Welcome, {{auth()->user()->name}}</h6>
                             
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    {{-- <ul>
                                        <li><a href="{{ url('/logout') }}"><i class=""></i> <span>Logout</span></a></li>
                                    </ul> --}}
                                    <form action="/logout/pelamar" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="icon-key"></i> Log Out</button>
                                      </form>
                                </div>
                            </div>
                        @endauth
                        {{-- </li> --}}

                  
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->