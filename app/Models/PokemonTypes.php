<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonTypes extends Model
{
    use HasFactory;

    public $fillable = ["pokemon_id", "type_id"];
}
