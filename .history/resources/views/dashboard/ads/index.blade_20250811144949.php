@extends('layouts.dashboard.master')
@section('title', 'Ads')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-4">قائمة الإعلانات</h4>

            @if($ads->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الصورة</th>
                                <th>العنوان</th>
                                <th>التصنيف</th>
                                <th>الحالة</th>
                                <th>المعلن</th>
                                <th>تاريخ الإنشاء</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ads as $index => $ad)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($ad->images->count() > 0)
                                            <img src="{{ asset('storage/' . $ad->images->first()->path) }}" 
                                                 alt="Ad Image" width="60" height="60"
                                                 style="object-fit: cover;" class="rounded">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" 
                                                 alt="Default Image" width="60" height="60"
                                                 style="object-fit: cover;" class="rounded">
                                        @endif
                                    </td>
                                    <td>{{ $ad->title ?? 'بدون عنوان' }}</td>
                                    <td>{{ $ad->adCategory->name ?? 'غير محدد' }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($ad->status == 'approved') bg-success
                                            @elseif($ad->status == 'pending') bg-warning text-dark
                                            @else bg-danger @endif">
                                            {{ $ad->status_text }}
                                        </span>
                                    </td>
                                    <td>{{ $ad->user->name ?? 'غير معروف' }}</td>
                                    <td>{{ $ad->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.ads.show', $ad->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            عرض التفاصيل
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- الباجينيشن --}}
                <div class="mt-3">
                    {{ $ads->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="alert alert-warning text-center">لا توجد إعلانات حالياً</div>
            @endif
        </div>
    </div>
</div>
@endsection
