<?php

namespace App\Interfaces\Property;

use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PropertyRepositoryInterface
{
    public function store(array $data);
    public function index(): Collection;         
    public function show(int $id): ?Property;     // منشور فقط وإلا null
}
