<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "hp",
        "attack",
        "defense",
        "special_attack",
        "special_defense",
        "speed",
    ];

    public function types()
    {
        return $this->belongsToMany(Types::class);
    }
}
