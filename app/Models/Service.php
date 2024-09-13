<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name'
    ];
    public function hotels() {
        return $this->belongsToMany(Hotel::class, 'service_details', 'service_id', 'hotel_id');
    }
}

