@extends('layouts.dashboard.master')

@section('title', 'Privacy Policy')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-shield-lock me-2"></i> {{ __('dashboard.privacy_policy') }}
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.privacyPolicy.update') }}" method="POST">
                @csrf

                {{-- Arabic Content --}}
                <div class="mb-4">
                    <label class="form-label fw-bold">{{ __('dashboard.content_ar') }}</label>
                    <textarea id="content_ar" name="content_ar" class="form-control summernote" rows="10">{!! old('content_ar', $privacy->content_ar ?? '') !!}</textarea>
                    @error('content_ar')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- English Content --}}
                <div class="mb-4">
                    <label class="form-label fw-bold">{{ __('dashboard.content_en') }}</label>
                    <textarea id="content_en" name="content_en" class="form-control summernote" rows="10">{!! old('content_en', $privacy->content_en ?? '') !!}</textarea>
                    @error('content_en')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-2"></i> {{ __('dashboard.save_changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'اكتب المحتوى هنا...',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endpush
