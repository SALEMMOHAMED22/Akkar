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
        <label for="subCatId">{{ __('dashboard.subCatId') }}</label>
        <select name="subCatId_id" wire:model.live="subCatIdId" class="form-control" id="subCatIdId">
            <option value="" selected>select subCatId</option>
            @foreach ($subCatIds as $subCatId)
            <option value="{{ $subCatId->id }}" >{{ $subCatId->name }}</option>
            @endforeach
          </select>
          @error('subCatId_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
    </div>
    <div class="form-group">
        <label for="city">{{ __('dashboard.city') }}</label>
        <select name="city_id" wire:model.live="cityId" class="form-control" id="cityId">
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
