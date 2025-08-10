@extends('layouts.dashboard.master')

@section('title', 'About Us')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">About Us</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.aboutUs.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>{{ __('dashboard.desc_ar') }}</label>
                <textarea id="desc_ar" name="desc_ar" class="form-control summernote" rows="10">{!! old('desc_ar', $aboutUs->desc_ar ?? '') !!}</textarea>
                @error('desc_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>{{ __('dashboard.desc_en') }}</label>
                <textarea id="desc_en" name="desc_en" class="form-control summernote" rows="10">{!! old('desc_en', $aboutUs->desc_en ?? '') !!}</textarea>
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
