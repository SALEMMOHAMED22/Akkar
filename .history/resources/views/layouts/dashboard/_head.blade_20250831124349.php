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
 @if (app()->getLocale() == 'ar')
     <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/demo_rtl.css" />
 @else
     <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/demo.css" />
 @endif

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

 {{-- DataTables CDN --}}

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap5.min.css">
 <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.min.css">


 {{-- colreorder DataTables --}}
 <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/colreorder/2.0.4/css/colReorder.bootstrap5.min.css">
 {{-- Rowreorder DataTables --}}
 <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.bootstrap5.min.css">

 {{-- select DataTable CDN --}}
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/2.1.0/css/select.bootstrap5.min.css">


 {{-- fixed Header DataTable CDN --}}
 <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/fixedheader/4.0.1/css/fixedHeader.bootstrap5.min.css">
 {{-- END DataTables CDN --}}


 <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

 <!-- Bootstrap 5 CSS -->
 {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 --}}
 <!-- Summernote CSS -->
 {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> --}}

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

