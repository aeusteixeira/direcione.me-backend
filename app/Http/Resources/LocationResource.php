<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'image' => $this->image,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'floor' => [
                'name' => $this->floor->name,
                'description' => $this->floor->description,
                'image' => $this->floor->image,
            ],
            'services' => $this->services->map(function ($service) {
                return [
                    'name' => $service->name,
                    'description' => $service->description,
                    'image' => $service->image,
                ];
            }),
        ];
    }
}
