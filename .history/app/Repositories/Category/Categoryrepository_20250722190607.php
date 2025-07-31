<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Interfaces\Category\CategoryInterface;

class Categoryrepository implements CategoryInterface
{
   
    public function index()
    {
         Category::with('subCategories')->get();

         

    }
}
