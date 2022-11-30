<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pokemon;
use App\Models\PokemonType;
use App\Models\Type;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    /**
     * Display
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(Request $request)
    {
        //$pokemon = Pokemon::find(2); // value to change
        //$request->type1
        $types = Type::all();
        //$pokemon = Pokemon::find(1)->types()->orderBy("updated_at")->get();//->paginate(5);

        return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2]);

    }
}
