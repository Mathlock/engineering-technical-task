<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function all(): Collection
    {
        return Property::all();
    }

    public function find(int $id): ?Property
    {
        return Property::findOrFail($id);
    }

    public function create(array $data): Property
    {
        return Property::create($data);
    }

    public function update(Property $property, array $data): bool
    {
        return $property->update($data);
    }

    public function delete(Property $property): void
    {
        $property->delete();
    }
}
