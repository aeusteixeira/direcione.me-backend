<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Http\Resources\BuildingResource;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BuildingResource::collection(Building::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {
        return response()->json([
            'message' => 'Prédio criado com sucesso',
            'data' => new BuildingResource(Building::create($request->validated()))
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return new BuildingResource($building);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        $building->update($request->validated());
        return response()->json([
            'message' => 'Prédio atualizado com sucesso',
            'data' => new BuildingResource($building)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $deleted = $building->delete();
        return response()->json([
            'message' => 'Prédio deletado com sucesso',
            'data' => $deleted
        ], 200);
    }
}
