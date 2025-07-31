<?php

namespace App\Repositories\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories()
    {
      $categories =   Category::with('subCategories')->get();

        dd($categories);



    }
}
