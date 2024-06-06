<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Property;
    public function create(array $data): Property;
    public function update(Property $property, array $data): bool;
    public function delete(Property $property): void;
}

