@extends('layouts.dashboard.master')

@section('title', 'Privacy Policy')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Privacy Policy</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.privacyPolicy.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>{{ __('dashboard.content_ar') }}</label>
                <textarea id="desc_ar" name="content_ar" class="form-control summernote" rows="10">{!! old('content_ar', $aboutUs->desc_ar ?? '') !!}</textarea>
                @error('content_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>{{ __('dashboard.content_en') }}</label>
                <textarea id="desc_en" name="desc_en" class="form-control summernote" rows="10">{!! old('content_en', $aboutUs->desc_en ?? '') !!}</textarea>
                @error('desc_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('dashboard.save_changes') }}</button>
        </form>
    </div>
</div>
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
