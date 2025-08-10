@extends('layouts.dashboard.master')

@section('title', 'How It Works')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 fw-bold text-center">
                    <i class="bi bi-shield-lock me-2"></i> {{ app()->getLocale() == 'ar' ? $howItWorks->title_ar : $howItWorks->title_en ?? __('dashboard.how_it_works') }}
                </h5>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('dashboard.privacyPolicy.update') }}" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <!-- Title Arabic -->
                    <div class="mb-3">
                        <label for="title_ar" class="form-label">{{ __('dashboard.title_ar') }}</label>
                        <input type="text" id="title_ar" name="title_ar"
                            value="{{ old('title_ar', $howItWorks->title_ar ?? '') }}" class="form-control">
                        @error('title_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Title English -->
                    <div class="mb-3">
                        <label for="title_en" class="form-label">{{ __('dashboard.title_en') }}</label>
                        <input type="text" id="title_en" name="title_en"
                            value="{{ old('title_en', $howItWorks->title_en ?? '') }}" class="form-control">
                        @error('title_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('dashboard.image') }}</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if (!empty($howItWorks->image))
                            <div class="mt-2">
                                <img src="{{ asset($howItWorks->image) }}" alt="About Us Image" class="img-thumbnail"
                                    style="max-height: 150px;">
                            </div>
                        @endif
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="langTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ar-tab" data-bs-toggle="tab" data-bs-target="#ar"
                                type="button" role="tab">
                                🇸🇦 {{ __('dashboard.arabic') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button"
                                role="tab">
                                🇬🇧 {{ __('dashboard.english') }}
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3">
                        <!-- Arabic Tab -->
                        <div class="tab-pane fade show active" id="ar" role="tabpanel">
                            <div class="mb-4">
                                <label class="form-label fw-bold">{{ __('dashboard.content_ar') }}</label>
                                <textarea id="content_ar" name="desc_ar" class="form-control summernote" rows="10">{!! old('content_ar', $howItWorks->desc_ar ?? '') !!}</textarea>
                                @error('desc_ar')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- English Tab -->
                        <div class="tab-pane fade" id="en" role="tabpanel">
                            <div class="mb-4">
                                <label class="form-label fw-bold">{{ __('dashboard.content_en') }}</label>
                                <textarea id="content_en" name="desc_en" class="form-control summernote" rows="10">{!! old('content_en', $howItWorks->desc_en ?? '') !!}</textarea>
                                @error('desc_en')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
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
                    ['table', ['table']]
                ]
            });
        });
    </script>
@endpush
