@extends('layouts.dashboard.master')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">{{ __('تفاصيل الإعلان') }}</h2>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ app()->getLocale() == 'ar' ? $ad->ad_name_ar : $ad->ad_name_en }}</h5>
        </div>
        <div class="card-body">
            <p><strong>الوصف المختصر:</strong> {{ app()->getLocale() == 'ar' ? $ad->small_desc_ar : $ad->small_desc_en }}</p>
            <p><strong>الوصف الكامل:</strong> {{ app()->getLocale() == 'ar' ? $ad->desc_ar : $ad->desc_en }}</p>
            <p><strong>السعر:</strong> {{ number_format($ad->price, 2) }}</p>
            <p><strong>الحالة:</strong> {{ $ad->AdStatus() }}</p>
            <p><strong>الموقع:</strong> {{ $ad->location }}</p>

            <hr>
            <p><strong>الفئة:</strong> {{ $ad->adCategory->name_ar ?? '-' }}</p>
            <p><strong>الفئة الفرعية:</strong> {{ $ad->adSubCategory->name_ar ?? '-' }}</p>
            <p><strong>الفئة الفرعية الفرعية:</strong> {{ $ad->adSubSubCategory->name_ar ?? '-' }}</p>
        </div>
    </div>

    {{-- بيانات المعلن --}}
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">بيانات المعلن</h5>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                @if($ad->user->image)
                    <img src="{{ asset($ad->user->image) }}" class="rounded-circle me-3" width="60" height="60">
                @else
                    <img src="{{ asset('default-avatar.png') }}" class="rounded-circle me-3" width="60" height="60">
                @endif
                <div>
                    <p class="mb-0"><strong>{{ $ad->user->name }}</strong></p>
                    <small>{{ $ad->user->type == 'company' ? 'شركة' : 'فرد' }}</small>
                </div>
            </div>
            <p><strong>البريد الإلكتروني:</strong> {{ $ad->user->email }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $ad->user->phone }}</p>

            @if($ad->user->type == 'company')
                <p><strong>اسم الشركة:</strong> {{ $ad->user->company_name }}</p>
                <p><strong>النوع:</strong> {{ $ad->user->companytype->name_ar ?? '-' }}</p>
                <p><strong>الرقم الضريبي:</strong> {{ $ad->user->tax_number }}</p>
            @endif
        </div>
    </div>

    {{-- الصور --}}
    @if($ad->images->count() > 0)
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">صور الإعلان</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($ad->images as $img)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $img->image) }}" class="img-fluid rounded border">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- الملفات --}}
    @if($ad->adFiles->count() > 0)
    <div class="card mb-4">
        <div class="card-header bg-warning">
            <h5 class="mb-0">الملفات المرفقة</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($ad->adFiles as $file)
                    <li class="list-group-item">
                        <a href="{{ asset('storage/' . $file->file) }}" target="_blank">
                            {{ $file->original_name }} ({{ number_format($file->size / 1024, 2) }} KB)
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- الأعمال السابقة --}}
    @if($ad->userWorks->count() > 0)
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">أعمال سابقة</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($ad->userWorks as $work)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $work->image) }}" class="img-fluid rounded border">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- التقييمات --}}
    @if($ad->reviews->count() > 0)
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">التقييمات</h5>
        </div>
        <div class="card-body">
            @foreach($ad->reviews as $review)
                <div class="border p-3 rounded mb-3">
                    <strong>{{ $review->user->name ?? 'مستخدم' }}</strong>
                    <span class="text-warning">⭐ {{ $review->rate }}</span>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
