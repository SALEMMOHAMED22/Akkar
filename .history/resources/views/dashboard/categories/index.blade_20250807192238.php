@extends('layouts.dashboard.master')

@section('title', 'Categories')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Categories View</h4>

    <div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 border shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                        </h5>
                    </div>
                    <div class="card-body">
                        @foreach ($category->subCategories as $subCategory)
                            <div class="mb-3">
                                <h6 class="text-dark fw-bold border-bottom pb-1">
                                    {{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}
                                </h6>
                                @if ($subCategory->subSubCategories->count())
                                    <ul class="list-unstyled ms-3">
                                        @foreach ($subCategory->subSubCategories as $subSubCategory)
                                            <li>– {{ app()->getLocale() == 'ar' ? $subSubCategory->name_ar : $subSubCategory->name_en }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted ms-3">لا توجد تصنيفات فرعية إضافية</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
