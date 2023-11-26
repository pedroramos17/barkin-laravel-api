<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\GatewayResource;
use Illuminate\Http\Response;

class GatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return GatewayResource::collection(Gateway::all())->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        Gateway::create($request->all());

        return response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gateway $gateway): GatewayResource
    {
        return new GatewayResource(Gateway::findOrFail($gateway->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gateway $gateway): Response
    {
        $gateway->update($request->all());

        return response()->setStatusCode(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gateway $gateway): Response
    {
        $gateway->delete();

        return response()->setStatusCode(204);
    }
}
