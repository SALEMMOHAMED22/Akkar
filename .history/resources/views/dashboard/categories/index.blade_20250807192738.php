@extends('layouts.dashboard.master')

@section('title', 'Categories')

@section('content')

    <div class="container py-4">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                        </h5>
                    </div>
                    <div class="card-body">
                        @forelse ($category->subCategories as $subCategory)
                            <div class="mb-3 ">
                                <h6 class="fw-semibold border-bottom pb-1 text-secondary">
                                    {{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}
                                </h6>

                                @if ($subCategory->subSubCategories->count())
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @foreach ($subCategory->subSubCategories as $subSubCategory)
                                            <span class="badge bg-light text-dark border">
                                                {{ app()->getLocale() == 'ar' ? $subSubCategory->name_ar : $subSubCategory->name_en }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted small mt-2">.......</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted">لا توجد تصنيفات فرعية</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection
