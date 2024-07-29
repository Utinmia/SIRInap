<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Sirehap - Sistem Reserfasi Penginapan')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/admin')}}/images/favicon.png">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{url('public/admin')}}/vendor/toastr/css/toastr.min.css">
    <link href="{{url('public/admin')}}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .toast-success {
            background-color: #50aa29;
        }
    </style>
    @yield('styles')
</head>

<body class="h-100">
    @yield('content')


<!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script src="{{url('public/admin')}}/vendor/global/global.min.js"></script>
    <script src="{{url('public/admin')}}/js/quixnav-init.js"></script>
    <script src="{{url('public/admin')}}/js/custom.min.js"></script>

     <!-- Toastr -->
     <script src="{{ url('public/admin') }}/vendor/toastr/js/toastr.min.js"></script>

     <!-- All init script -->
     <script src="{{ url('public/admin') }}/js/plugins-init/toastr-init.js"></script>

     {{-- <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script> --}}

    <script>
        @if(Session::has('success'))
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

        @if(Session::has('error'))
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