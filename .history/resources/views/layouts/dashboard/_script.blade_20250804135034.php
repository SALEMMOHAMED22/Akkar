<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/dashboard') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('assets/dashboard') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('assets/dashboard') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('assets/dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('assets/dashboard') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/dashboard') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('assets/dashboard') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('assets/dashboard') }}/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


{{-- File Input --}}
<script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script>
<script src="{{ asset('vendor/file-input/themes/fa5/theme.min.js') }}"></script>

@if (Config::get('app.locale') == 'ar')
    <script src="{{ asset('vendor/file-input/js/locales/LANG.js') }}"></script>
    <script src="{{ asset('vendor/file-input/js/locales/ar.js') }}"></script>
@endif

<script>
    var lang = "{{ app()->getLocale() }}";
    $(function() {

        $('#single-image').fileinput({
            theme: 'fa5',
            language: lang,
            allowFileType: ['image'],
            maxFileCount: 1,
            enableResumablesUpload: false,
            showUpload: false,
        });
    });
</script>
{{-- End File Input --}}
