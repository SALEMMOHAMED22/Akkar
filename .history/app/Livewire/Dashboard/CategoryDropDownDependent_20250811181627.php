<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\AdCategory;
use App\Models\AdSubCategory;
use App\Models\AdSubSubCategory;

class CategoryDropDownDependent extends Component
{
    public $category_id , $subCat_id , $subSubCat_id;
    public function render()
    {

        return view('livewire.dashboard.category-drop-down-dependent' , [
            'categories' => AdCategory::get(),
            'subCats' => $this->subCat_id ?     ::where('ad_category_id' , $this->category_id)->get() : [],
            'subSubCats' => $this->subSubCat_id ? AdSubSubCategory::where('ad_sub_category_id' , $this->subCat_id)->get() : [],
        ]);
    }
}
