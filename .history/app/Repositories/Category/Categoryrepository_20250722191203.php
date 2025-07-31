<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Interfaces\Category\CategoryInterface;
use App\Interfaces\Category\CategoryRepositoryInterface;

class Categoryrepository implements CategoryRepositoryInterface
{
   
    public function index()
    {
      $categories =   Category::with('subCategories')->get();

        dd($categories);



    }
}
