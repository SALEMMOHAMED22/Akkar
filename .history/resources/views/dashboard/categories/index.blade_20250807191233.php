@extends('layouts.dashboard.master')

@section('title', 'Categories')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tables /</span> Categories Hierarchy
    </h4>

    <div class="card">
        <h5 class="card-header">Category Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Sub Sub Category</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        @if ($category->subCategories->count())
                            @foreach ($category->subCategories as $subCategory)
                                @if ($subCategory->subSubCategories->count())
                                    @foreach ($subCategory->subSubCategories as $subSubCategory)
                                        <tr>
                                            <td>{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}</td>
                                            <td>{{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}</td>
                                            <td>{{ app()->getLocale() == 'ar' ? $subSubCategory->name_ar : $subSubCategory->name_en }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}</td>
                                        <td>{{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}</td>
                                        <td><span class="text-muted">—</span></td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td>{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}</td>
                                <td><span class="text-muted">—</span></td>
                                <td><span class="text-muted">—</span></td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-danger">No Categories Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
