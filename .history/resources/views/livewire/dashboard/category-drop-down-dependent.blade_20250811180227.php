<div class="row g-3">
    {{-- الفئة الرئيسية --}}
    <div class="col-md-4">
        <label for="categoryId" class="form-label">{{ __('dashboard.category') }}</label>
        <select name="category_id" wire:model.live="categoryId" id="categoryId" class="form-select">
            <option value="" selected>{{ __('Select category') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    {{-- الفئة الفرعية --}}
    <div class="col-md-4">
        <label for="subCatId" class="form-label">{{ __('dashboard.subCat') }}</label>
        <select name="subCat_id" wire:model.live="subCatId" id="subCatId" class="form-select">
            <option value="" selected>{{ __('Select sub category') }}</option>
            @foreach ($subCats as $subCat)
                <option value="{{ $subCat->id }}">
                    {{ app()->getLocale() == 'ar' ? $subCat->name_ar : $subCat->name_en }}
                </option>
            @endforeach
        </select>
        @error('subCat_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    {{-- الفئة الفرعية الثانية --}}
    <div class="col-md-4">
        <label for="subSubCatId" class="form-label">{{ __('dashboard.subsubcat') }}</label>
        <select name="subSubCat_id" wire:model.live="subSubCatId" id="subSubCatId" class="form-select">
            <option value="" selected>{{ __('Select sub sub category') }}</option>
            @foreach ($subSubCats as $subSubCat)
                <option value="{{ $subSubCat->id }}">
                    {{ app()->getLocale() == 'ar' ? $subSubCat->name_ar : $subSubCat->name_en }}
                </option>
            @endforeach
        </select>
        @error('subSubCat_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>
