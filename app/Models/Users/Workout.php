<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'user_id'
    ];

    // Relationship

    public function weeks() {
        return $this->hasMany(Week::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
