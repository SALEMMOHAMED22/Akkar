@extends('layouts.dashboard.master')

@section('title', 'terms Policy')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">{{ app }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.termsAndConditions.update') }}" method="POST">
                    @csrf
                    <!-- Title Arabic -->
                    <div class="mb-3">
                        <label for="title_ar" class="form-label">{{ __('dashboard.title_ar') }}</label>
                        <input type="text" id="title_ar" name="title_ar"
                            value="{{ old('title_ar', $terms->title_ar ?? '') }}" class="form-control">
                        @error('title_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Title English -->
                    <div class="mb-3">
                        <label for="title_en" class="form-label">{{ __('dashboard.title_en') }}</label>
                        <input type="text" id="title_en" name="title_en"
                            value="{{ old('title_en', $terms->title_en ?? '') }}" class="form-control">
                        @error('title_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('dashboard.image') }}</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if (!empty($terms->image))
                            <div class="mt-2">
                                <img src="{{ asset($terms->image) }}" alt="About Us Image" class="img-thumbnail"
                                    style="max-height: 150px;">
                            </div>
                        @endif
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>{{ __('dashboard.content_ar') }}</label>
                        <textarea id="content_ar" name="content_ar" class="form-control summernote" rows="10">{!! old('content_ar', $terms->content_ar ?? '') !!}</textarea>
                        @error('content_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>{{ __('dashboard.content_en') }}</label>
                        <textarea id="content_en" name="content_en" class="form-control summernote" rows="10">{!! old('content_en', $terms->content_en ?? '') !!}</textarea>
                        @error('content_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('dashboard.save_changes') }}</button>
                </form>
            </div>
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
