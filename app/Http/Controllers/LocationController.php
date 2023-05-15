<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\LocationResource;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LocationResource::collection(Location::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        return response()->json([
            'message' => 'Local criado com sucesso',
            'data' => new LocationResource(Location::create($request->validated()))
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->validated());
        return response()->json([
            'message' => 'Local atualizado com sucesso',
            'data' => new LocationResource($location)
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $deleted = $location->delete();
        return response()->json([
            'message' => 'Local deletado com sucesso',
        ], 204);
    }
}
