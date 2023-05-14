<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'image',
        'phone',
        'email',
        'website',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'locations_has_services', 'location_id', 'service_id');
    }
}
