<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        "name",
        "hp",
        "attack",
        "defense",
        "special_attack",
        "special_defense",
        "speed",
        "number",
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class, "pokemon_types");
    }

    public function nameWithFirstLetterCapitalized()
    {
        return ucfirst($this->name);
    }
}
