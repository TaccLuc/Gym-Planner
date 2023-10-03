<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    
    // Relationships

    public function workout() {
        return $this->belongsTo(Workout::class);
    }

    public function exercises() {
        return $this->hasMany(Exercise::class);
    }
}
