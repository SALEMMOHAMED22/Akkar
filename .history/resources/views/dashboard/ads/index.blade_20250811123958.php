@extends('layouts.dashboard.master')
@section('title', 'Ads')

@section('content')
        <div class="container py-4">
    <div class="row g-4">
        @forelse($ads as $ad)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    {{-- صورة الإعلان --}}
                    @if($ad->images->count() > 0)
                        <img src="{{ asset('storage/' . $ad->images->first()->path) }}" class="card-img-top" alt="Ad Image">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif

                    <div class="card-body">
                        {{-- عنوان الإعلان --}}
                        <h5 class="card-title">{{ $ad->title }}</h5>

                        {{-- التصنيفات --}}
                        <p class="text-muted mb-1">
                            التصنيف: {{ $ad->adCategory->name ?? 'غير محدد' }}<br>
                            التصنيف الفرعي: {{ $ad->adSubCategory->name ?? 'غير محدد' }}<br>
                            التصنيف الفرعي الثاني: {{ $ad->adSubSubCategory->name ?? 'غير محدد' }}
                        </p>

                        {{-- معلومات المعلن --}}
                        <p class="small mb-1">
                            المعلن: {{ $ad->user->name ?? 'غير معروف' }}
                        </p>

                        {{-- الوصف --}}
                        <p class="card-text">{{ Str::limit($ad->description, 100) }}</p>
                    </div>

                    <div class="card-footer text-center">
                        <a href="{{ route() }}" class="btn btn-primary btn-sm">عرض التفاصيل</a>
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