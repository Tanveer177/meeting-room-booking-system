<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'organizer_id', 'start_time', 'end_time'];

    public function organizer()
    {
        return $this->belongsTo(Employee::class, 'organizer_id');
    }

}
