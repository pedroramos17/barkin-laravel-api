<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\VehicleResource;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return VehicleResource::collection(Vehicle::all())->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        Vehicle::create($request->all());

        return response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): VehicleResource
    {
        return new VehicleResource(Vehicle::findOrFail($vehicle->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle): Response
    {
        $vehicle->update($request->all());

        return response()->setStatusCode(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): Response
    {
        $vehicle->delete();

        return response()->setStatusCode(204);
    }
}
