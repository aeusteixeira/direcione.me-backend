<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'locations_has_services', 'service_id', 'location_id');
    }
}
