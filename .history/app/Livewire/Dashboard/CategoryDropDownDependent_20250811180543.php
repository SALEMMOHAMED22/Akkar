<?php

namespace App\Livewire\Dashboard;

use App\Models\AdCategory;
use App\Models\AdSubCategory;
use Livewire\Component;

class CategoryDropDownDependent extends Component
{
    public $category_id , $subCat_id , $subSubCat_id;
    public function render()
    {

        return view('livewire.dashboard.category-drop-down-dependent' , [
            'categories' => AdCategory::get(),
            'sub_categories' => $this->subCat_id ? AdSubCategory::where('ad_category_id' , $this->category_id)->get() : [],
            'sub'
        ]);
    }
}
