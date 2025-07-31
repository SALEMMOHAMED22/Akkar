<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\SubCategory;

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
      $subCategories = SubCategory::all();

      
      if(!$subCategories){
          return false ;
      }
      return $subCategories;

      
    }


    public function getCategoryById(int $id){

      $category = Category::with('subCategories')->find($id);
      if(!$category){
        return false;
      }
      return $category;
    }

    public function getCatsWithSubCats(){
      $categories = Category::with('subCategories')->get();
      if(!$categories){
        return false;
      }
      // dd($categories);
      return $categories;
    }

    public function getSubCategoriesByCatId()



}
