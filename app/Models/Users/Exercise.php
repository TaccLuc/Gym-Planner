<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    // Relationships

    public function movement() {
        return $this->belongsTo(Movement::class);
    }

    public function day() {
        return $this->belongsTo(Day::class);
    }
}
