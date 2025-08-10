@extends('layouts.dashboard.master')

@section('title', 'About Us')


@section('content')
    <div class="card">
        <div class="card-header">
            <h5>تعديل صفحة من نحن</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label>{{ __('dashboard.desc_ar') }}</label>
                    <textarea id="desc_ar" name="desc_ar" class="form-control" >{{ old('desc_ar', $aboutUs->desc_ar ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label>{{ __('dashboard.desc_en') }} </label>
                    <textarea id="desc_en" name="desc_en" class="form-control">{{ old('desc_en', $aboutUs->desc_en ?? '') }}</textarea>
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
                height: 400
            });
            $('#desc_en').summernote({
                placeholder: 'Write the description in English...',
                height: 400
            });
        });
    </script>
@endpush


