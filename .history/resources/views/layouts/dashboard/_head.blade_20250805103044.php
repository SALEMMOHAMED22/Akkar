 <meta charset="utf-8" />
 <meta name="viewport"
     content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

 <title>@yield('title')</title>

 <meta name="description" content="" />

 <!-- Favicon -->
 <link rel="icon" type="image/x-icon" href="{{ asset('assets/dashboard') }}/img/favicon/favicon.ico" />

 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.googleapis.com" />
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
 <link
     href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
     rel="stylesheet" />

 <!-- Icons. Uncomment required icon fonts -->
 <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/boxicons.css" />

 <!-- Core CSS -->
 <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/core.css"
     class="template-customizer-core-css" />
 <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/theme-default.css"
     class="template-customizer-theme-css" />
     if
 <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/demo.css" />

 <!-- Vendors CSS -->
 <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

 <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/apex-charts/apex-charts.css" />

 <!-- Page CSS -->

 <!-- Helpers -->
 <script src="{{ asset('assets/dashboard') }}/vendor/js/helpers.js"></script>

 <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
 <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
 <script src="{{ asset('assets/dashboard') }}/js/config.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 {{-- File Input --}}
 <link rel="stylesheet" href="{{ asset('vendor/file-input/css/fileinput.min.css') }}">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous">
 {{-- End File Input --}}
