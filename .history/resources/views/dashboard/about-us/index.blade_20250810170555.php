@extends('layouts.dashboard.master')

@section('title', 'About Us')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header text-white text-center" style="background: linear-gradient(90deg, #6c757d, #495057);">
            <h5 class="mb-0"><i class="bi bi-info-circle me-2 text-warning"></i>About Us</h5>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('dashboard.aboutUs.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Arabic -->
                <div class="mb-3">
                    <label for="title_ar" class="form-label">{{ __('dashboard.title_ar') }}</label>
                    <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar', $aboutUs->title_ar ?? '') }}" class="form-control">
                    @error('title_ar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Title English -->
                <div class="mb-3">
                    <label for="title_en" class="form-label">{{ __('dashboard.title_en') }}</label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $aboutUs->title_en ?? '') }}" class="form-control">
                    @error('title_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">{{ __('dashboard.image') }}</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @if(!empty($aboutUs->image))
                        <div class="mt-2">
                            <img src="{{ asset($aboutUs->image) }}" alt="About Us Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    @endif
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs mb-3" id="aboutTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc_ar_tab" data-bs-toggle="tab" data-bs-target="#desc_ar_content" type="button" role="tab">
                            {{ __('dashboard.desc_ar') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="desc_en_tab" data-bs-toggle="tab" data-bs-target="#desc_en_content" type="button" role="tab">
                            {{ __('dashboard.desc_en') }}
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="desc_ar_content" role="tabpanel">
                        <textarea name="desc_ar" class="form-control summernote">{!! old('desc_ar', $aboutUs->desc_ar ?? '') !!}</textarea>
                        @error('desc_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="tab-pane fade" id="desc_en_content" role="tabpanel">
                        <textarea name="desc_en" class="form-control summernote">{!! old('desc_en', $aboutUs->desc_en ?? '') !!}</textarea>
                        @error('desc_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-1"></i>{{ __('dashboard.save_changes') }}
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
