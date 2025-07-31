<?php

namespace App\Interfaces\Category;

interface CategoryRepositoryInterface 
{
    
    public function getCategories();
    public function getSubCategories();

}
