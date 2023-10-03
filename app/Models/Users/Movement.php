<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    // Relationship

    public function excercises() {
        return $this->hasMany(Exercise::class);
    }
}
