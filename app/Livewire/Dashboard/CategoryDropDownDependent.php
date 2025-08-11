<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\AdCategory;
use App\Models\AdSubCategory;
use App\Models\AdSubSubCategory;

class CategoryDropDownDependent extends Component
{
   public $categoryId, $subCatId, $subSubCatId;

    public function render()
    {

        return view('livewire.dashboard.category-drop-down-dependent' , [
            'categories' => AdCategory::get(),
            'subCats' => $this->categoryId  ? AdSubCategory::where('ad_category_id' , $this->categoryId)->get() : [],
            'subSubCats' => $this->subCatId  ? AdSubSubCategory::where('ad_sub_category_id' , $this->subCatId)->get() : [],
        ]);
    }
}
