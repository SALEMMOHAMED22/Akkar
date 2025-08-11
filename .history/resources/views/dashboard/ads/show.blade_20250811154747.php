@extends('layouts.dashboard.master')

@section('content')
    <div class="container my-4">
        <h2 class="mb-4 text-primary text-center">
            <i class="bi bi-info-circle"></i> تفاصيل الإعلان
        </h2>

        {{-- تفاصيل الإعلان --}}
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    {{ app()->getLocale() == 'ar' ? $ad->ad_name_ar : $ad->ad_name_en }}
                </h5>


                @if (auth()->user())
                    <form action="{{ route('dashboard.ads.updateStatus', $ad->id) }}" method="POST"
                        class="d-flex align-items-center">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                            <option value="approved" {{ $ad->status == 'approved' ? 'selected' : '' }}>مقبول</option>
                            <option value="pending" {{ $ad->status == 'pending' ? 'selected' : '' }}>معلق</option>
                            <option value="rejected" {{ $ad->status == 'rejected' ? 'selected' : '' }}>مرفوض</option>
                        </select>
                    </form>
                @else
                    <span
                        class="badge 
                    @if ($ad->status == 'approved') bg-success 
                    @elseif($ad->status == 'pending') bg-warning 
                    @else bg-danger @endif">
                        {{ $ad->status_text }}
                    </span>
                @endif
            </div>

            <div class="card-body p-4 mt-3">
                <p><strong>{{ __('dashboard.price') . ' : ' }}</strong> {{ number_format($ad->price, 2) }} <span
                        class="text-muted">{{ app()->getLocale() == 'ar' ? 'جنيه' : 'USD' }}</span></p>
                <p><strong>{{ __('dashboard.location') . ' : ' }}</strong> {{ $ad->location }}</p>

                {{-- الوصف المختصر --}}
                <p><strong>{{ __('dashboard.small_desc') }}</strong>
                    {{ app()->getLocale() == 'ar' ? $ad->small_desc_ar : $ad->small_desc_en }}</p>

                {{-- الوصف الكامل داخل Accordion --}}
                <div class="accordion" id="descAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingDesc">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseDesc" aria-expanded="true" aria-controls="collapseDesc">
                                {{ __('dashboard.desc') }} , {{ __('dashboard.hide') }} / {{ __('dashboard.show') }}
                            </button>
                        </h2>
                        <div id="collapseDesc" class="accordion-collapse collapse show" aria-labelledby="headingDesc"
                            data-bs-parent="#descAccordion">
                            <div class="accordion-body">
                                {!! nl2br(e(app()->getLocale() == 'ar' ? $ad->desc_ar : $ad->desc_en)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                {{-- التصنيفات --}}
                <div class="row">
                    <div class="col-md-4"><strong>{{ __('dashboard.category') }} : </strong>
                        {{ app()->getLocale() == 'ar' ? $ad->adCategory->name_ar : $ad->adCategory->name_en ?? '-' }}
                    </div>
                    <div class="col-md-4"><strong>{{ __('dashboard.sub_category') }} : </strong>
                        {{ app()->getLocale() == 'ar' ? $ad->adSubCategory->name_ar : $ad->adSubCategory->name_en ?? '-' }}
                    </div>
                    <div class="col-md-4"><strong>{{ __('dashboard.sub_sub_category') }} : </strong>
                        {{ app()->getLocale() == 'ar' ? $ad->adSubSubCategory->name_ar : $ad->adSubSubCategory->name_en ?? '-' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- بيانات المعلن --}}
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-secondary text-white d-flex align-items-center">
                <i class="bi bi-person-circle me-2"></i>
                <h5 class="mb-0">بيانات المعلن</h5>
            </div>
            <div class="card-body p-4" >
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ $ad->user->image ? asset($ad->user->image) : asset('default-avatar.png') }}"
                        class="rounded-circle border shadow-sm me-3" width="80" height="80" alt="User Avatar">
                    <div>
                        <h6 class="mb-1">{{ $ad->user->name }}
                            <span class="badge bg-primary">{{ $ad->user->type == 'company' ? 'شركة' : 'فرد' }}</span>
                        </h6>
                        <small class="text-muted">{{ $ad->user->email }}</small><br>
                        <small class="text-muted">{{ $ad->user->phone }}</small>
                    </div>
                </div>

                @if ($ad->user->type == 'company')
                    <div class="border-top pt-3 mt-3">
                        <p class="mb-2"><i class="bi bi-building me-2 text-primary"></i> <strong>اسم الشركة:</strong>
                            {{ $ad->user->company_name }}</p>
                        <p class="mb-2"><i class="bi bi-briefcase me-2 text-primary"></i> <strong>نوع الشركة:</strong>
                            {{ $ad->user->companytype->name_ar ?? '-' }}</p>
                        <p class="mb-0"><i class="bi bi-receipt me-2 text-primary"></i> <strong>الرقم الضريبي:</strong>
                            {{ $ad->user->tax_number }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- صور الإعلان --}}
        @if ($ad->images->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">صور الإعلان</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($ad->images as $img)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset($img->image) }}" class="img-fluid rounded border shadow-sm mt-3"  style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- الملفات --}}
        @if ($ad->adFiles->count() > 0)
            <div class="card shadow mb-4 ">
                <div class="card-header bg-warning ">
                    <h5 class="mb-0">الملفات المرفقة</h5>
                </div>
                <div class="card-body mt-3">
                    <ul class="list-group">
                        @foreach ($ad->adFiles as $file)
                            <li class="list-group-item">
                                <a href="{{ asset($file->file) }}" target="_blank">
                                    {{ $file->original_name }} ({{ number_format($file->size / 1024, 2) }} KB)
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- الأعمال السابقة --}}
        @if ($ad->userWorks->count() > 0)
            <div class="card shadow mb-4 mt-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">أعمال سابقة</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($ad->userWorks as $work)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset($work->image) }}" class="img-fluid rounded border shadow-sm mt-3" style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- التقييمات --}}
        @if ($ad->reviews->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">التقييمات</h5>
                </div>
                <div class="card-body">
                    @foreach ($ad->reviews as $review)
                        <div class="border p-3 rounded mb-3 shadow-sm">
                            <strong>{{ $review->user->name ?? 'مستخدم' }}</strong>
                            <span class="text-warning">⭐ {{ $review->rate }}</span>
                            <p class="mb-0">{{ $review->comment }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="text-center mt-4">
    <a href="{{ route('dashboard.ads.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left-circle"></i> رجوع لصفحة الإعلانات
    </a>
</div>
    </div>
@endsection
