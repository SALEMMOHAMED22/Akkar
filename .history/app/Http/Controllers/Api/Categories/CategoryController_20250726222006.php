<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CatsWithSubCatsResource;
use App\Http\Resources\SubCategoriesResource;
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

        return apiResponse(200, 'SubCategories fetched successfully', );
    }

    public function getCategoryById(int $id){
        $category = $this->categoryRepo->getCategoryById($id);
        if (!$category) {
            return apiResponse(404, 'Category not found');
        }
        return apiResponse(200, 'Category fetched successfully', new CatsWithSubCatsResource($category));
    }
    public function getCatsWithSubCats(){
        $categories = $this->categoryRepo->getCatsWithSubCats();
        if (!$categories) {
            return apiResponse(404, 'Categories not found');            
        }
        return apiResponse(200, 'Categories and SubCategories fetched successfully', CatsWithSubCatsResource::collection($categories));
    }

    public function getSubCategoriesByCatId(int $id){
        $subCategories = $this->categoryRepo->getSubCategoriesByCatId($id);
        if (!$subCategories) {
            return apiResponse(404, 'SubCategories not found');
        }
        return apiResponse(200, 'SubCategories fetched successfully', SubCategoriesResource::collection($subCategories) );
    }
}
