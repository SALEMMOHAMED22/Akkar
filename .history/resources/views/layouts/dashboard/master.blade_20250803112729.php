<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="{{ app()->getLocale() }}"
  class="light-style layout-menu-fixed"
  dir="@if(app()->getLocale() == 'ar') rtl @else ltr @endif"
    
  @endif"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/dashboard') }}/"
  data-template="vertical-menu-template-free"
>
  <head>
   @include('layouts.dashboard._head')
    @stack('css')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        {{-- Sidebar --}}
        @include('layouts.dashboard._sidebar')
        {{-- Sidebar     --}}
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            @include('layouts.dashboard._navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
            <!-- Content -->

            @yield('content')

            <!-- / Content -->

            <!-- Footer -->
           @include('layouts.dashboard.footer')

            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    {{-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> --}}

    <!-- Core JS -->
    @include('layouts.dashboard._script')

    @stack('js')
  </body>
</html>
