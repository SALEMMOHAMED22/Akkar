<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\PropertyStoreRequest;
use App\Interfaces\Property\PropertyRepositoryInterface;

class PropertyController extends Controller
{
    public $propertyRepo;
    public function __construct(PropertyRepositoryInterface $propertyRepo)
    {
        $this->propertyRepo = $propertyRepo;
    }


     public function index()
    {
        $items = $this->propertyRepo->index();

        return apiResponse(
            200,
            __('response.properties_list'),
            PropertyResource::collection($items),
            [

            'current_page' => $items->currentPage(),
            'last_page' => $items->lastPage(),
            'per_page' => $items->perPage(),
            'total' => $items->total(),
        ]
        );
    }

    public function show(int $id)
    {
        $prop = $this->propertyRepo->show($id);

        if (!$prop) {
            return apiResponse(404, __('response.property_not_found'));
        }

        return apiResponse(200, __('response.property_show'), new PropertyResource($prop));
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
            new PropertyResource($result->load(['images', 'files', 'user']))
        );
    }


}
