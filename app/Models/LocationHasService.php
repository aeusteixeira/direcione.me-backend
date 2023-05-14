<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationHasService extends Model
{
    use HasFactory;
    protected $table = 'locations_has_services';

    protected $fillable = [
        'location_id',
        'service_id',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
