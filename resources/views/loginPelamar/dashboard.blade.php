<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Badan Penanggulangan Bencana</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('./assets/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('./assets/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <style>
      a {
        font-size: 1.5rem;
        color: #ff5500;
        background-color: rgba(243, 243, 249, .3);
        transition: background-color .5s, color .5s;
        display: inline-block;
        border: 2px solid #ff5500;
      }
      a:hover{
        color: white;
        background-color: #ff5500;
      }
      .tombol-a .login {
        padding: .5rem 0;
      }
      .top-content h3{
        color: #ff5500;
      }
      .tombol-a {
        margin-top: 1rem
      }
      .tombol-a .login {
        padding: .2rem 3.3rem;
      }
      .divider {
        border-top: 3px solid #ff5500;
        width: 600rem;
        margin-left: -200rem;
      }
      .bawah {
        margin-top: 2rem;
      }
      .bawah-content h4 {
        color: white;
      }
      .content {
        height: 100vh;
        overflow: hidden;
      }
      .waves {
        z-index: -12;
        bottom: 0;
        display: block;
        width: 100vw !important;
      }
      .body-content {
        height: 100% !important;
      }
      .body-content .logo {
        right: 150px;
      }
      .body-content .d-flex {
        gap: 50px;
      }
      .inside-content {
        background-color: rgba(243, 243, 249, .5);
      }
      .inside-content h5{
        color: #ff5500;
      }
    </style>

</head>

<body>

    @include('layout.preload')

    
    <!--**********************************
        Main wrapper start
    ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content">

            <div class="mt-3" style="height: 100%">
              <div class="body-content" style="position: relative">
                <div class="waves" style="position: absolute">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff5500" fill-opacity="0.5" d="M0,0L30,10.7C60,21,120,43,180,42.7C240,43,300,21,360,16C420,11,480,21,540,32C600,43,660,53,720,80C780,107,840,149,900,160C960,171,1020,149,1080,133.3C1140,117,1200,107,1260,122.7C1320,139,1380,181,1410,202.7L1440,224L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
                </div>
                <div class="">
                  <div class="row" style="position: relative">
                    <div class="col text-center mt-4 top-content">
                      <h3>Sistem Pendukung Keputusan Metode Profile Matching</h3>
                      <h3>Penerimaan Pegawai Badan Penanggulangan Bencana Daerah Kabupaten Serang</h3>
                    </div>
                    <img class="logo" style="width: 100px; position:absolute" src="{{ asset('/assets/img/bpbdkabserang.png') }}" alt="Logo BPDBkabserang">
                  </div>

                  <div class="divider mt-3"></div>

                  <div class="tombol-a">
                    <div class="row d-flex mt-4 ml-5 mr-5 text-center">
                      <div class="col inside-content">
                        <h5>Tentang kami</h5>
                        <p>Provinsi Banten yang letaknya sangat strategis dalam wilayah negara kesatuan Republik Indonesia memiliki berbagai keunggulan. Namun disisi lain Provinsi Banten memiliki tingkat ancaman bencana yang tidak sedikit, dari 14 (empat belas) bencana yang tercantum dalam rencana nasional penanggulangan bencana semuanya berpotensi terdapat di Provinsi Banten.   Paradigma Penanggulangan bencana yang telah bergeser dari responsif preventif, menekankan tentang pentingnya pengurangan risiko bencana sebagaimana telah diamanatkan dalam Undang-undang No. 24 tahun 2007 tentang Penanggulangan Bencana. Salah satu upaya Pengurangan risiko bencana, yaitu dengan memberikan informasi sedini mungkin tentang langkah-langkah penanggulangan bencana kepada masyarakat.</p>
                      </div>
                      <div class="col inside-content">
                        <h5>Visi</h5>
                        <div class="text-center">
                          <p>”Tangguh dan Profesional dalam Penanggulangan Bencana”.</p>
                        </div>
                        <h5>Misi</h5>
                        <div class="text-center">
                          <ul>
                            <li>Menciptakan Tata kelola pemerintah yang baik (Good Governance).</li>
                            <li>Membangun sistem penyelenggaraan Penanggulangan Bencana  yang Terpadu, Efektif dan Efesien.</li>
                          </ul>
                        </div>
                      </div>
                      <div class="col inside-content">
                        <h5>Bidang - Bidang</h5>
                        <h6>Bidang Kesekretariatan</h6>
                        <div class="text-left">
                          <p>- Bidang pencegahan dan kesiapsiagaan</p>
                          <p>- Bidang Penanganan kedaruratan.</p>
                          <p>- Bidang rehabiliasi dan rekontruksi</p>
                          <p>- Bidang Pemadam Kebakaran</p>
                        </div>
                      </div>
                    </div>

                    <div class="row text-center mt-3 login">
                      <div class="col">
                        <a href="/login" class="login">Masuk</a>
                      </div>
                    </div>
                  </div>

                  <div class="row text-center bawah">
                    <div class="col bawah-content">
                      <h4>Selamat Datang</h4>
                      <h4>Sistem Penerimaan Pegawai</h4>
                      <h4>Badan Penanggulangan Bencana Daerah Kabupaten Serang</h4>
                      <h4 class="mt-4 h2">Mari Berkarir Bersama Kami</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('./assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('./assets/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('./assets/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('./assets/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('./assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('./assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('./assets/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{ asset('./assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>


    <script src="{{ asset('./assets/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('./assets/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/validation/jquery.validate-init.js') }}"></script>

</body>

</html>