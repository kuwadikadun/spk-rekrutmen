<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('./assets/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('./assets/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    @include('layout.preload')

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layout.topbar')

        @include('layout.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        @include('layout.footer')
    </div>
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



    <script src="{{ asset('./assets/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('./assets/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/validation/jquery.validate-init.js') }}"></script>

</body>

</html>