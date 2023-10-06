<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_id'
    ];

    public function workout() {
        return $this->belongsTo(Workout::class);
    }

    public function days() {
        return $this->hasMany(Day::class);
    }
}
