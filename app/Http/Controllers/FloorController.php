<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Resources\FloorResource;
use FFI;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new FloorResource(Floor::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFloorRequest $request)
    {
        return response()->json([
            'message' => 'Andar criado com sucesso',
            'data' => new FloorResource(Floor::create($request->validated()))
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Floor $floor)
    {
        return new FloorResource($floor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        $floor->update($request->validated());
        return response()->json([
            'message' => 'Andar atualizado com sucesso',
            'data' => new FloorResource($floor)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor)
    {
        $deleted = $floor->delete();
        return response()->json([
            'message' => 'Andar deletado com sucesso',
            'data' => $deleted
        ], 200);
    }
}
