@extends('layouts.dashboard.master')

@section('title', 'About Us')


@section('content')
    <div class="card">
        <div class="card-header">
            <h5>تعديل صفحة من نحن</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('about.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>الوصف (عربي)</label>
                    <textarea id="desc_ar" name="desc_ar">{{ old('desc_ar', $about->desc_ar ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label>الوصف (إنجليزي)</label>
                    <textarea id="desc_en" name="desc_en">{{ old('desc_en', $about->desc_en ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#desc_ar').summernote({
                placeholder: 'اكتب الوصف بالعربية...',
                height: 200
            });
            $('#desc_en').summernote({
                placeholder: 'Write the description in English...',
                height: 200
            });
        });
    </script>
@endpush


@endsection
