<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RoomController extends BaseController
{
    protected RoomRepositoryInterface $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function index(): JsonResponse
    {
        try {
            $rooms = $this->roomRepository->all();
            return response()->json($rooms, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch rooms'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function roomsFromProperty(int $propertyId): JsonResponse
    {
        try {
            $rooms = $this->roomRepository->roomsFromProperty($propertyId);
            return response()->json($rooms, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch rooms'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreRoomRequest $request)
    {
        try {
            $room = $this->roomRepository->create($request->validated());
            return response()->json($room, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create room'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateRoomRequest $request, int $id)
    {
        try {
            $room = $this->roomRepository->find($id);
            $updateStatus = $this->roomRepository->update($room, $request->validated());
            return response()->json([
                'status' => $updateStatus
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update room'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id)
    {
        try {
            $room = $this->roomRepository->find($id);
            $this->roomRepository->delete($room);

            return response()->json([
                'message' => 'Room deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete room'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
