<?php

namespace App\Repositories\Category;

use App\Interfaces\Category\CategoryInterface;

class Categoryrepository implements CategoryInterface
{
   
    public function index()
    {
        return Category::all();
    }
}
