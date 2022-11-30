<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;
use App\Models\DamageType;

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
        //$pokemon = Pokemon::find(1)->types()->orderBy("updated_at")->get();//->paginate(5);
        $types = Type::all();
        $specialDamages = DamageType::where('offensetype_id', '=', $request->type1, 'or', 'offensetype_id', '=', $request->type2)->get();
        //$pokemonX2 = PokemonType::with("types")->where("offensive_type=" == $request->type1);
        //dd($specialDamages);
        return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2]);

    }
}
