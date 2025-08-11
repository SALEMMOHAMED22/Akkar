@extends('layouts.dashboard.master')
@section('title', 'Ads')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        @forelse($ads as $ad)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    {{-- صورة الإعلان --}}
                    @if($ad->images->count() > 0)
                        <img src="{{ asset('storage/' . $ad->images->first()->path) }}" 
                             class="card-img-top" 
                             alt="Ad Image"
                             style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" 
                             class="card-img-top" 
                             alt="Default Image"
                             style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        {{-- عنوان الإعلان --}}
                        <h5 class="card-title fw-bold">{{ $ad->title }}</h5>

                        {{-- التصنيفات --}}
                        <p class="text-muted mb-1 small">
                            التصنيف: {{ $ad->adCategory->name ?? 'غير محدد' }}<br>
                            التصنيف الفرعي: {{ $ad->adSubCategory->name ?? 'غير محدد' }}<br>
                            التصنيف الفرعي الثاني: {{ $ad->adSubSubCategory->name ?? 'غير محدد' }}
                        </p>

                        {{-- معلومات المعلن --}}
                        <p class="small text-secondary mb-1">
                            <i class="bi bi-person"></i> المعلن: {{ $ad->user->name ?? 'غير معروف' }}
                        </p>

                        {{-- الوصف --}}
                        <p class="card-text">{{ Str::limit($ad->description, 80) }}</p>
                    </div>

                    <div class="card-footer bg-white text-center border-0">
                        <a href="{{ route('dashboard.ads.show', ['id' => $ad->id']) }}" class="btn btn-primary btn-sm">
                            عرض التفاصيل
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">لا توجد إعلانات حالياً</div>
            </div>
        @endforelse
    </div>

    {{-- الباجينيشن --}}
    <div class="mt-4">
        {{ $ads->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
