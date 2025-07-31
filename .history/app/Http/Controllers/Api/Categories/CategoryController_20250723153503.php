<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Interfaces\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getCategories()
    {
        $categories = $this->categoryRepo->getCategories();

        if (!$categories) {
            return apiResponse(404, 'Categories not found');
        }

        return apiResponse(200, 'Categories fetched successfully', CategoryResource::collection($categories));
    }

    public function getSubCategories(){

        $subCategories = $this->categoryRepo->getSubCategories();

        if (!$subCategories) {
            return apiResponse(404, 'SubCategories not found');
        }

        return apiResponse(200, 'SubCategories fetched successfully', $subCategories);
    }
}
