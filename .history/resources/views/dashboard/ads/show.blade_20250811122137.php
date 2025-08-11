@extends('layouts.dashboard.master')

@section('title')
    Ad Show
@endsection
@section('content')
<div class="container py-4">

    <h2 class="mb-4">{{ app()->getLocale() == 'ar' ? $ad->ad_name_ar : $ad->ad_name_en }}</h2>

    <div class="row">
        {{-- الصور --}}
        <div class="col-md-6">
            @if($ad->images->count() > 0)
                <div id="adImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($ad->images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset($image->image) }}" class="d-block w-100" alt="Ad Image">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#adImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#adImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            @else
                <img src="{{ asset('default.jpg') }}" class="img-fluid" alt="Default Image">
            @endif
        </div>

        {{-- التفاصيل --}}
        <div class="col-md-6">
            <h4>التفاصيل</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>التصنيف:</strong> {{ app()->getLocale() == 'ar' ? $ad->adCategory->name_ar : $ad->adCategory->name_en }) ?? 'غير محدد' }}</li>
                <li class="list-group-item"><strong>التصنيف الفرعي:</strong> {{ app()->getLocale() == 'ar' ? $ad->adSubCategory->name_ar : $ad->adSubCategory->name_en ?? 'غير محدد' }}</li>
                <li class="list-group-item"><strong>التصنيف الفرعي الثاني:</strong> {{ app()->getLocale() == 'ar' ? $ad->adSubSubCategory->name_ar : $ad->adSubSubCategory->name_en ?? 'غير محدد' }}</li>
                <li class="list-group-item"><strong>المعلن:</strong> {{ $ad->user->name ?? 'غير معروف' }}</li>
                <li class="list-group-item"><strong>الوصف:</strong> {{ app()->getLoca }}</li>
                <li class="list-group-item"><strong>السعر:</strong> {{ $ad->price ?? 'غير متوفر' }}</li>
            </ul>

            {{-- لو فيه أعمال سابقة --}}
            @if($ad->userWorks->count() > 0)
                <h5>أعمال سابقة</h5>
                <ul class="list-group">
                    @foreach($ad->userWorks as $work)
                        <li class="list-group-item">{{ $work->title ?? 'عمل بدون عنوان' }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    {{-- الملفات --}}
    @if($ad->adFiles->count() > 0)
        <div class="mt-4">
            <h4>ملفات مرفقة</h4>
            <ul class="list-group">
                @foreach($ad->adFiles as $file)
                    <li class="list-group-item">
                        <a href="{{ asset('storage/' . $file->path) }}" target="_blank">{{ $file->name ?? 'ملف' }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- المراجعات --}}
    @if($ad->reviews->count() > 0)
        <div class="mt-4">
            <h4>التقييمات والمراجعات</h4>
            @foreach($ad->reviews as $review)
                <div class="border p-3 mb-2 rounded">
                    <strong>{{ $review->user->name ?? 'مستخدم مجهول' }}</strong>
                    <span class="text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            {!! $i <= $review->rating ? '★' : '☆' !!}
                        @endfor
                    </span>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    @endif

    {{-- رجوع --}}
    <div class="mt-4">
        <a href="{{ route('dashboard.ads.index') }}" class="btn btn-secondary">رجوع</a>
    </div>
</div>
@endsection
