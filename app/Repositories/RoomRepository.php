<?php

namespace App\Repositories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;

class RoomRepository implements RoomRepositoryInterface
{
    public function all(): Collection
    {
        return Room::all();
    }

    public function find(int $id): ?Room
    {
        return Room::findOrFail($id);
    }

    public function create(array $data): Room
    {
        return Room::create($data);
    }

    public function update(Room $room, array $data): bool
    {
        return $room->update($data);
    }

    public function delete(Room $room): void
    {
        $room->delete();
    }

    public function roomsFromProperty($propertyId): Collection
    {
        return Room::where('property_id', $propertyId)->get();
    }
}
