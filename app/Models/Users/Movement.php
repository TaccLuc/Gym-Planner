<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reps',
        'max_weight',
        'user_id'
    ];

    // Relationship

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
