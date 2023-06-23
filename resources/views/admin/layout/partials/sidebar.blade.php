<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="{{ url('/') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/lowongan') }}" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Lowongan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/pelamar') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Data Pelamar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/administrasi') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Administrasi</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('profil') }}" aria-expanded="false">
                            <i class="fa fa-user"></i><span class="nav-text">Lengkapi Profil</span>
                        </a>
                    </li> --}}
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-trophy menu-icon"></i><span class="nav-text">Jadwal Tes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/admin/jadwal_keterampilan') }}">Keterampilan</a></li>
                            <li><a href="{{ url('/admin/jadwal_wawancara')}}">Wawancara</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-trophy menu-icon"></i><span class="nav-text">Nilai Tes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/admin/keterampilan') }}">Keterampilan</a></li>
                            <li><a href="{{ url('/admin/wawancara')}}">Wawancara</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="{{ url('pelamar_diterima') }}" aria-expanded="false">
                            <i class="icon-check menu-icon"></i><span class="nav-text">Pelamar Diterima</span>
                        </a>
                    </li> --}}
             
                    <li>
                        <a href="{{ url('user') }}" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Peringkat</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->