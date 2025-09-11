<?php

namespace App\Interfaces\Property;

use App\Models\Property;

interface PropertyRepositoryInterface
{
    public function store(array $data);
    public function index(array $filters = []): LengthAwarePaginator;
    public function show(int $id): ?Property;
}
