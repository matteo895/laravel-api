<?php
// Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_id',
        // Add other fields as needed
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
}
