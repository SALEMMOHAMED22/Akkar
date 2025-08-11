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
        <label for="subCa">{{ __('dashboard.subCa') }}</label>
        <select name="subCa_id" wire:model.live="subCaId" class="form-control" id="subCaId">
            <option value="" selected>select subCa</option>
            @foreach ($subCas as $subCa)
            <option value="{{ $subCa->id }}" >{{ $subCa->name }}</option>
            @endforeach
          </select>
          @error('subCa_id')
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
