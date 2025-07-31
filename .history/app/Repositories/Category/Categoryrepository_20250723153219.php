<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Interfaces\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories()
    {
      $categories = Category::all();

      
      if(!$categories){
        return false;
      }

      return $categories;



    }


    public function getSubCategories()
    {
      $subCategories = 
      
    }
}
