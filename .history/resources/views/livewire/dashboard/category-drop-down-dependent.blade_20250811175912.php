<div>
    <div>
    <div class="form-group">
        <label for="categoryId">{{ __('dashboard.category') }}</label>
        <select name="category_id" wire:model.live="categoryId" class="form-control" id="categoryId">
            <option value="" selected>select category</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" >{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}</option>
          @endforeach
        </select>
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror 
    </div>
    <div class="form-group">
        <label for="subCat">{{ __('dashboard.subCat') }}</label>
        <select name="subCat_id" wire:model.live="subCatId" class="form-control" id="subCatId">
            <option value="" selected>select sub category</option>
            @foreach ($subCats as $subCat)
            <option value="{{ $subCat->id }}" >{{ app()->getLocale() == 'ar' ? $subCat->name_ar : $subCat->name_en }}</option>
            @endforeach
          </select>
          @error('subCat_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
    </div>
    <div class="form-group">
        <label for="subCatId">{{ __('dashboard.subsubcat') }}</label>
        <select name="subSubCat_id" wire:model.live="subSubCatId" class="form-control" id="subSubCatId">
            <option value="" selected>select city</option>
            @foreach ($cities as $city)
            <option value="{{ $city->id }}" >{{ $city->name }}</option>
            @endforeach
          </select>
          @error('city_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
    </div>
</div>
</div>
