<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_id'
    ];
    
    // Relationships

    public function week() {
        return $this->belongsTo(Week::class);
    }

    public function exercises() {
        return $this->hasMany(Exercise::class);
    }
}
