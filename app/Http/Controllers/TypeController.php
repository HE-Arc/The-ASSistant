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
        $types = Type::all();
        // $specialDamages = DamageType::where('offensetype_id', '=', $request->type1, 'or', 'offensetype_id', '=', $request->type2)->get(); // dosent work
        // $pokemonX2 = PokemonType::with("types")->where("offensive_type=" == $request->type1);
        $specialDamages1 = DamageType::where('offensetype_id', '=', $request->type1)->get();
        $specialDamages2 = [];
        if($request->type2 != null)
        {
            $specialDamages2 = DamageType::where('offensetype_id', '=', $request->type2)->get(); // second type types
        }

        $damages = [
            "0" => [],
            "0.5" => [],
            "1" => [],
            "2" => []
        ];

        foreach($types as $type)
        {
            $damage1 = 1; // by default, if one of the types of the pokémon don't have this type in their list, that means it is x1 power
            foreach($specialDamages1 as $damageType)
            {
                if($damageType->defensetype_id == $type->id)
                {
                    $damage1 = $damageType->damagemultiplier; // get the damage multiplier
                }
            }

            // same for second type
            $damage2 = 1;
            foreach($specialDamages2 as $damageType)
            {
                if($damageType->defensetype_id == $type->id)
                {
                    $damage2 = $damageType->damagemultiplier;
                }
            }

            $currentDamage = max($damage1, $damage2); // we keep the type that makes the most damage
            array_push($damages[$currentDamage], $type);
        }
        return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2, "damageTypes" => $damages]);

    }
}
