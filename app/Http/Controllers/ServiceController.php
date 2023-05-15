<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ServiceResource::collection(Service::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        return response()->json([
            'message' => 'Serviço criado com sucesso',
            'data' => new ServiceResource(Service::create($request->validated()))
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return response()->json([
            'message' => 'Serviço atualizado com sucesso',
            'data' => new ServiceResource($service)
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $deleted = $service->delete();
        return response()->json([
            'message' => 'Serviço deletado com sucesso',
        ], 204);
    }
}
