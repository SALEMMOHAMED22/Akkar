<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyStoreRequest;
use App\Interfaces\Property\PropertyRepositoryInterface;

class PropertyController extends Controller
{
    public $propertyRepo;
    public function __construct(PropertyRepositoryInterface $propertyRepo)
    {
        $this->propertyRepo = $propertyRepo;
    }

     public function store(PropertyStoreRequest $request)
    {
        $result = $this->propertyRepo->store($request->validated());

        if (is_string($result)) {
            return apiResponse(400, $result);
        }

        return apiResponse(
            200,
            __('message.property_created'),
            new PropertyResource($result->load(['images', 'attachments', 'user']))
        );
    }


}
