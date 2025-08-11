<?php

namespace App\Livewire\Dashboard;

use App\Models\AdCategory;
use Livewire\Component;

class CategoryDropDownDependent extends Component
{
    public $category_id , $subCat_id , $subSubCat_id;
    public function render()
    {

        return view('livewire.dashboard.category-drop-down-dependent' , [
            'categories' => AdCategory::get(),
            'sub_categories' => 
        ]);
    }
}
