<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    // Relationship

    public function days() {
        return $this->hasMany(Day::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
