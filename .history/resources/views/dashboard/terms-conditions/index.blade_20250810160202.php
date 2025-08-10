@extends('layouts.dashboard.master')

@section('title', 'Privacy Policy')

@section('content')

@endsection

@push('js')
<script>
    $(document).ready(function() {
       $('.summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        ]
      });
    });
</script>
@endpush
