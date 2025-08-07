@extends('layouts.dashboard.master')

@section('title', 'Categories')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Categories View</h4>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Sub Sub Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    @foreach ($category->subCategories as $subCategory)
                        @php
                            $subSubCategories = $subCategory->subSubCategories;
                            $rowspan = max(1, $subSubCategories->count());
                        @endphp

                        @foreach ($subSubCategories as $index => $subSubCategory)
                            <tr>
                                @if ($loop->first && $index === 0)
                                    <td
                                        rowspan="{{ $category->subCategories->sum(function ($subCat) {
                                            return max(1, $subCat->subSubCategories->count());
                                        }) }}">
                                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                    </td>
                                @endif

                                @if ($index === 0)
                                    <td rowspan="{{ $rowspan }}">
                                        {{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}
                                    </td>
                                @endif

                                <td>
                                    {{ app()->getLocale() == 'ar' ? $subSubCategory->name_ar : $subSubCategory->name_en }}
                                </td>
                            </tr>
                        @endforeach

                        @if ($subSubCategories->isEmpty())
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $category->subCategories->count() }}">
                                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                    </td>
                                @endif
                                <td>
                                    {{ app()->getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}
                                </td>
                                <td>—</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
