<?php

namespace App\Models;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'tour_id',
    ];

    public function getTour()
    {
        return $this->hasOne(Tour::class, 'id', 'tour_id');
    }
}
