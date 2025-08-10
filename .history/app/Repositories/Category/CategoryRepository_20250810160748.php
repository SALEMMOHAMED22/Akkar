<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\AdSubCategory;
use App\Models\SubCategory;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories()
    {
      $categories = AdCategory::all();

      
      if(!$categories){
        return false;
      }

      return $categories;



    }


    public function getSubCategories()
    {
      $subCategories = AdSubCategory::all();

      
      if(!$subCategories){
          return false ;
      }
      return $subCategories;

      
    }


    public function getCategoryById(int $id){

      $category = AdCategory::with('subCategories')->find($id);
      if(!$category){
        return false;
      }
      return $category;
    }

    public function getCatsWithSubCats(){
      $categories = AdCategory::with('subCategories.subSubCategories')->get();
      if(!$categories){
        return false; 
      }
      // dd($categories);
      return $categories;
    }

    public function getSubCategoriesByCatId($id){
      $subCategories = AdSubCategory::where('ad_category_id', $id)->get();
      if(!$subCategories){
        return false;
      }
      return $subCategories;
    }

     public function getSubSubCategoriesBySubCatId($id){
      $subCategories = Ad::where('ad_category_id', $id)->get();
      if(!$subCategories){
        return false;
      }
      return $subCategories;
    }




}
