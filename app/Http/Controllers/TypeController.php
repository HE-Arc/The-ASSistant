<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;
use App\Models\DamageType;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    /**
     * Display the damages done on any type depending on the selected types
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(Request $request)
    {
        $types = Type::all();

        // check if the page should not display the affectation because the user just clicked on the page, or if wrong inputs
        if($request->type1 == null || (
            ($request->type1 <= -1 || $request->type1 > count($types)) &&
            ($request->type2 <= -1 || $request->type2 > count($types))))
        {
            return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2, "defatt" => "attack"]);
        }

        // add affectations of valid selected types on all the types
        $specialDamages = [];
        if($request->type1 >= 0 && $request->type1 <= count($types))
        {
            array_push($specialDamages, DamageType::where('offensetype_id', '=', $request->type1)->get());
        }

        if($request->type2 != null && $request->type2 >= 0 && $request->type2 <= count($types))
        {
            array_push($specialDamages, DamageType::where('offensetype_id', '=', $request->type2)->get()); // second type, can be null so prevented in condition
        }

        $damages = [
            "0" => [],
            "0.5" => [],
            "1" => [],
            "2" => []
        ];

        foreach($types as $type)
        {
            $maxDamage = 0;
            // for each type chosen by the user
            foreach($specialDamages as $specialDamage)
            {
                $damage = 1;
                // for each type affected by the current type
                foreach($specialDamage as $damageType)
                {
                    if($damageType->defensetype_id == $type->id) // if good type
                    {
                        $damage = $damageType->damagemultiplier; // get the damage multiplier
                    }
                }
                $maxDamage = max($maxDamage, $damage); // keep the best damage
            }
            array_push($damages[strval($maxDamage)], $type);
        }
        return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2, "damageTypes" => $damages, "defatt" => "attack"]);
    }

    /**
     * Display
     *
     * @return \Illuminate\Http\Response
     */
    public function defense(Request $request)
    {
        $types = Type::all();

        // check if good parameters
        if($request->type1 == null || (
            ($request->type1 <= -1 || $request->type1 > count($types)) &&
            ($request->type2 <= -1 || $request->type2 > count($types))))
        {
            return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2, "defatt" => "defense"]);
        }

        // add affectations of valid selected types on all the types
        $specialDamages = [];
        if($request->type1 >= 0 && $request->type1 <= count($types))
        {
            array_push($specialDamages, DamageType::where('defensetype_id', '=', $request->type1)->get());
        }

        if($request->type2 != null && $request->type2 >= 0 && $request->type2 <= count($types))
        {
            array_push($specialDamages, DamageType::where('defensetype_id', '=', $request->type2)->get()); // second type, can be null so prevented in condition
        }

        $damages = [
            "0" => [],
            "0.25" => [],
            "0.5" => [],
            "1" => [],
            "2" => [],
            "4" => []
        ];

        foreach($types as $type)
        {
            $maxDamage = 1;
            // for each type chosen by the user
            foreach($specialDamages as $specialDamage)
            {
                $damage = 1;
                // for each type affected by the current type
                foreach($specialDamage as $damageType)
                {
                    if($damageType->offensetype_id == $type->id) // if good type
                    {
                        $damage = $damageType->damagemultiplier; // get the damage multiplier
                    }
                }
                $maxDamage = $maxDamage * $damage; // keep the best damage
            }
            array_push($damages[strval($maxDamage)], $type);
        }
        return view("types.attack", ["types" => $types, "type1" => $request->type1, "type2" => $request->type2, "damageTypes" => $damages, "defatt" => "defense"]);

    }
}
