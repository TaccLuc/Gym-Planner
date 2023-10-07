<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sets',
        'reps',
        'percentage',
        'weight',
        'day_id'
    ];

    // Relationships

    public function day() {
        return $this->belongsTo(Day::class);
    }

    
}
