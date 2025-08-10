@extends('layouts.dashboard.master')

@section('title', 'Edit About Us')

@push('css')
    {{-- Summernote CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('dashboard.edit_about_us') }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('about.update') }}" method="POST">
            @csrf
            @method('PUT') {{-- عشان update --}}
            
            <div class="mb-3">
                <label>{{ __('dashboard.desc_ar') }}</label>
                <textarea id="desc_ar" name="desc_ar" class="form-control" rows="10">
                    {{ old('desc_ar', $aboutUs->desc_ar ?? '') }}
                </textarea>
            </div>

            <div class="mb-3">
                <label>{{ __('dashboard.desc_en') }}</label>
                <textarea id="desc_en" name="desc_en" class="form-control" rows="10">
                    {{ old('desc_en', $aboutUs->desc_en ?? '') }}
                </textarea>
            </div>

            <button type="submit" class="btn btn-success">{{ __('dashboard.save_changes') }}</button>
        </form>
    </div>
</div>
@endsection

@push('js')
    {{-- Summernote JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#desc_ar').summernote({
                placeholder: '{{ __("dashboard.desc_ar_placeholder") }}',
                height: 200
            });
            $('#desc_en').summernote({
                placeholder: '{{ __("dashboard.desc_en_placeholder") }}',
                height: 200
            });
        });
    </script>
@endpush
