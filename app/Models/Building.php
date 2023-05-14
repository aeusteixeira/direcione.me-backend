<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'image',
        'description',
        'user_id',
    ];

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'buildings_has_services', 'building_id', 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locations()
    {
        return $this->hasManyThrough(Location::class, Floor::class);
    }
}
