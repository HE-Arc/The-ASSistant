<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use App\Models\Type;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::with("types")->paginate(5);
        //$pokemon = Pokemon::find(1)->types()->orderBy("updated_at")->get();//->paginate(5);

        return view("pokemon.index", compact("pokemon"))->with(
            "i",
            (request()->input("page", 1) - 1) * 5
        );
    }

    /**
     * Display
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(Request $request)
    {
        $pokemon = Pokemon::find(2); // value to change
        return view("pokemon.attack", ["pokemon" => $pokemon]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view("pokemon.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "hp" => "required|integer|gte:0|lte:255",
            "attack" => "required|integer|gte:0|lte:255",
            "defense" => "required|integer|gte:0|lte:255",
            "special_attack" => "required|integer|gte:0|lte:255",
            "special_defense" => "required|integer|gte:0|lte:255",
            "speed" => "required|integer|gte:0|lte:255",
            "number" => "nullable|integer|gte:0|lte:151",
            "type_one" => "exists:types,id",
            "type_two" => "nullable",
        ]);
        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->hp = $request->hp;
        $pokemon->attack = $request->attack;
        $pokemon->defense = $request->defense;
        $pokemon->special_attack = $request->special_attack;
        $pokemon->special_defense = $request->special_defense;
        $pokemon->speed = $request->speed;
        $pokemon->number = $request->number;
        $pokemon->save();

        $id = $pokemon->id;

        $pokemonTypes = new PokemonType();
        $pokemonTypes->pokemon_id = $id;
        $pokemonTypes->type_id = $request->type_one;
        $pokemonTypes->save();

        $pokemonTypes = new PokemonType();
        $pokemonTypes->pokemon_id = $id;
        $pokemonTypes->type_id = $request->type_two;
        $pokemonTypes->save();

        $pokemon->save($request->all());
        return redirect()
            ->route("pokemon.index")
            ->with("success", "Pokemon created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("pokemon.show", [
            "pokemon" => Pokemon::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pokemon.edit", [
            "pokemon" => Pokemon::with("types")->findOrFail($id),
            "types" => Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "hp" => "required|integer|gte:0|lte:255",
            "attack" => "required|integer|gte:0|lte:255",
            "defense" => "required|integer|gte:0|lte:255",
            "special_attack" => "required|integer|gte:0|lte:255",
            "special_defense" => "required|integer|gte:0|lte:255",
            "speed" => "required|integer|gte:0|lte:255",
            "number" => "nullable|integer|gte:0|lte:151",
            "type_one" => "exists:types,id",
            "type_two" => "nullable",
        ]);
        $pokemon = Pokemon::findOrfail($id)->update($request->all());

        $pokemonTypes = PokemonType::where("pokemon_id", $id)->first();
        $pokemonTypes->type_id = $request->type_one;
        $pokemonTypes->save();
        if ($request->type_two != -1) {
            $pokemonTypes = PokemonType::where("pokemon_id", $id)->get()[1];
            $pokemonTypes->type_id = $request->type_two;
            $pokemonTypes->save();
        }
        return redirect()
            ->route("pokemon.index")
            ->with("success", "Pokemon updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pokemon::findOrfail($id)->delete();
        return redirect()
            ->route("pokemon.index")
            ->with("success", "Pokemon deleted successfully");
    }
}
