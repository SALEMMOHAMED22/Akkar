@extends('layouts.dashboard.master')

@section('title', 'About Us')

@section('content')
<div>
    
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
       $('.summernote').summernote({
        placeholder: 'اكتب هنا...',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
          ['view', ['fullscreen', 'codeview']]
        ]
      });
    });
</script>
@endpush
