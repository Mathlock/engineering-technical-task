<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PropertyController extends BaseController
{
    protected PropertyRepositoryInterface $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function index(): JsonResponse
    {
        try {
            $properties = $this->propertyRepository->all();
            return response()->json($properties, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch properties'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $property = $this->propertyRepository->find($id);
            return response()->json($property, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch property'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StorePropertyRequest $request): JsonResponse
    {
        try {
            $property = $this->propertyRepository->create($request->validated());
            return response()->json($property, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create property'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdatePropertyRequest $request, int $id): JsonResponse
    {
        try {
            $property = $this->propertyRepository->find($id);
            $updateStatus = $this->propertyRepository->update($property, $request->validated());
            return response()->json([
                'status' => $updateStatus
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update property'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $property = $this->propertyRepository->find($id);
            $this->propertyRepository->delete($property);

            return response()->json(['message' => 'Property deleted successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete property'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
