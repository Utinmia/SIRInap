<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')</title>
    @include('admin.template.section.header')
    <style>
        body {
            color: #8f8f8f !important;
        }

        .tooltip-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip-container .tooltip-text {
            visibility: hidden;
            width: 100px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 2px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            /* Position the tooltip above the text */
            left: 50%;
            margin-left: -70px;
            /* Use margin to center the tooltip */
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip-container .tooltip-text::after {
            content: "";
            position: absolute;
            top: 100%;
            /* At the bottom of the tooltip */
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip-container:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        .stat-widget-two .stat-digit i {
            font-size: 30px;
            margin-right: 10px;
        }

        .toast-success {
            background-color: #50aa29;
        }

        .brand-title {
            margin-left: 10px !important;
            max-width: 150px !important;
        }

        .logo-abbr {
            max-width: 45px !important;
        }

        .quixnav .metismenu>li.mm-active>a {
            background-color: #559E35;
            color: #fff;
        }

        .quixnav .metismenu>li>a:hover {
            background-color: #559E35;
            /* color: #fff; */
        }

        .btn-success {
            color: #fff;
        }

        .text-success {
            color: #559E35;
        }


        .page-titles h4 {
            color: #559E35;
        }

        .hamburger .line {
            background: #559E35;
        }

        [data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .nav-header .nav-control .hamburger .line {
            background-color: #559E35 !important;
        }
    </style>
    @yield('styles')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('administrator/admin') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ url('public') }}/logo/sir_1.png" alt="">
                <img class="logo-compact" src="{{ url('public') }}/logo/sir-text.png" alt="">
                <img class="brand-title" src="{{ url('public') }}/logo/sir-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                @include('admin.template.section.navbar')
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                @include('admin.template.section.sidebar')
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#">Penginapan Nur Aini</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('public/admin') }}/vendor/global/global.min.js"></script>
    <script src="{{ url('public/admin') }}/js/quixnav-init.js"></script>
    <script src="{{ url('public/admin') }}/js/custom.min.js"></script>
    <!-- Vectormap -->
    <script src="{{ url('public/admin') }}/vendor/raphael/raphael.min.js"></script>
    <script src="{{ url('public/admin') }}/vendor/morris/morris.min.js"></script>

    <script src="{{ url('public/admin') }}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ url('public/admin') }}/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ url('public/admin') }}/vendor/gaugeJS/dist/gauge.min.js"></script>
    <!--  flot-chart js -->
    <script src="{{ url('public/admin') }}/vendor/flot/jquery.flot.js"></script>
    <script src="{{ url('public/admin') }}/vendor/flot/jquery.flot.resize.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ url('public/admin') }}/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <!-- Counter Up -->
    <script src="{{ url('public/admin') }}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ url('public/admin') }}/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ url('public/admin') }}/vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ url('public/admin') }}/js/dashboard/dashboard-1.js"></script>
    <!-- Toastr -->
    <script src="{{ url('public/admin') }}/vendor/toastr/js/toastr.min.js"></script>
    <!-- All init script -->
    <script src="{{ url('public/admin') }}/js/plugins-init/toastr-init.js"></script>
    <!-- Datatable -->
    <script src="{{ url('public/admin') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('public/admin') }}/js/plugins-init/datatables.init.js"></script>

    <!-- Jquery Validation -->
    <script src="{{ url('public/admin') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="{{ url('public/admin') }}/js/plugins-init/jquery.validate-init.js"></script>
    <!-- Select2 -->
    <script src="{{ url('public/admin') }}/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ url('public/admin') }}/js/plugins-init/select2-init.js"></script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}", "Success", {
                positionClass: "toast-top-right",
                timeOut: 5000,
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                preventDuplicates: true,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: false
            });
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}", "Error", {
                positionClass: "toast-top-right",
                timeOut: 5000,
                closeButton: true,
                debug: false,
                newestOnTop: true,
                progressBar: true,
                preventDuplicates: true,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: false
            });
        @endif
    </script>

    @yield('scripts')

</body>

</html>
