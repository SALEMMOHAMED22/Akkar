<?php

namespace App\Interfaces\Category;

interface CategoryRepositoryInterface 
{
    
    public function getCategories();
    public function getSubCategories();
    public function getCatsWithSubCats();
    public function getCategoryById(int $id);
    public function getSubCategoriesByCatId(int );


}
