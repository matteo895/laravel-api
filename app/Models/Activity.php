<?php

// Activity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'image',
    ];
    public $timestamps = false;
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'activity_index', 'id');
    }
}
