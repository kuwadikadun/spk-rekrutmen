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
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            {{-- <h3 class="mt-2 ml-2">Nama</h3> --}}
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <form action="{{ url('/logout/pegawai') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"></i> <span>Logout</span></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->