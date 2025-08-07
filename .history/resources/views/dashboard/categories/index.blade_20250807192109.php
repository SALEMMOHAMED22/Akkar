@extends('layouts.dashboard.master')

@section('title', 'Categories')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Categories View</h4>

    <div class="container">
        @forelse ($categories as $category)
            {{-- Category Name --}}
            <div class="row my-3">
                <div class="col-12">
                    <h5 class="text-primary">
                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                    </h5>
                </div>
            </div>

            {{-- Sub Categories --}}
            <div class="row mb-2">
                @forelse ($category->subCategories as $subCategory)
                    <div class="col-md-3">
                        <div class="card mb-2 p-2 bg-light">
                            <strong>{{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}</strong>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning">No Subcategories</div>
                    </div>
                @endforelse
            </div>

            {{-- Sub Sub Categories --}}
            <div class="row">
                @forelse ($category->subCategories as $subCategory)
                    @foreach ($subCategory->subSubCategories as $subSubCategory)
                        <div class="col-md-3">
                            <div class="card mb-2 p-2 bg-secondary text-white">
                                {{ app()->getLocale() == 'ar' ? $subSubCategory->name_ar : $subSubCategory->name_en }}
                            </div>
                        </div>
                    @endforeach
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning">No SubSubCategories</div>
                    </div>
                @endforelse
            </div>

            <hr>
        @empty
            <div class="alert alert-danger">No Categories Available</div>
        @endforelse
    </div>
@endsection
