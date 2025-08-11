<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class CategoryDropDownDependent extends Component
{
    public $category_id , $subCat_;
    public function render()
    {

        return view('livewire.dashboard.category-drop-down-dependent');
    }
}
