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

{{-- DataTables CDN --}}
{{-- bootStrap DataTables --}}
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js" type="text/javascript">
</script>

{{-- colreorder DataTables --}}
<script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js" type="text/javascript">
</script>
<script src="https://cdn.datatables.net/colreorder/2.0.4/js/colReorder.bootstrap5.min.js" type="text/javascript">
</script>
{{-- Rowreorder DataTables --}}
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js" type="text/javascript">
</script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.min.js" type="text/javascript">
</script>
{{-- select DataTable CDN --}}
<script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/select/2.1.0/js/select.bootstrap5.min.js" type="text/javascript"></script>
{{-- fixed Header DataTable CDN --}}
<script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js" type="text/javascript">
</script>
<script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js" type="text/javascript">
</script>


<script src="{{ asset('assets/datatables/excel/jszip.min.js') }}"></script>
<script src="{{ asset('assets/datatables/pdf/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/datatables/pdf/vfs_fonts.js') }}"></script>

{{-- End DataTables CDN --}}


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


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script> --}}
<!-- Summernote JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
