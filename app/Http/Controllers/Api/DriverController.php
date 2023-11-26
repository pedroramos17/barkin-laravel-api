<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\DriverResource;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return DriverResource::collection(Driver::all())->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        Driver::create($request->all());

        return response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver): DriverResource
    {
        return new DriverResource(Driver::findOrFail($driver->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver): Response
    {
        $driver->update($request->all());

        return response()->setStatusCode(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver): Response
    {
        $driver->delete();

        return response()->setStatusCode(204);
    }
}
