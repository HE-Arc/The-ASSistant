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

        return view("pokemon.index", compact("pokemon"))->with(
            "i",
            (request()->input("page", 1) - 1) * 5
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!empty(session('username')))
        {
            $types = Type::all();
            return view("pokemon.create", compact("types"));
        }
        else
        {
            return redirect()
            ->route("pokemon.index")
            ->with("error", "Vous ne pouvez pas créer un Pokémon si vous n'êtes pas connnecté.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty(session('username')))
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

            try {
                $pokemon->save();
            } catch (\Throwable $th) {
                return redirect()
                    ->route("pokemon.create")
                    ->with("error", "Erreur lors de la création du Pokémon");
            }

            $id = $pokemon->id;

            $pokemonTypes = new PokemonType();
            $pokemonTypes->pokemon_id = $id;
            $pokemonTypes->type_id = $request->type_one;
            $pokemonTypes->save();

            if ($request->type_two > 0) {
                $pokemonTypes = new PokemonType();
                $pokemonTypes->pokemon_id = $id;
                $pokemonTypes->type_id = $request->type_two;
                $pokemonTypes->save();
            }

            $pokemon->save($request->all());
            return redirect()
                ->route("pokemon.index")
                ->with("success", "Pokemon created successfully.");
        }
        else
        {
            return redirect()
            ->route("pokemon.index")
            ->with("error", "Vous ne pouvez pas créer un Pokémon si vous n'êtes pas connnecté.");
        }
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
        if(!empty(session('username')))
        {
            return view("pokemon.edit", [
                "pokemon" => Pokemon::with("types")->findOrFail($id),
                "types" => Type::all(),
            ]);
        }
        else
        {
            return redirect()
            ->route("pokemon.index")
            ->with("error", "Vous ne pouvez pas modifier un Pokémon si vous n'êtes pas connnecté.");
        }
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
        if(!empty(session('username')))
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
        else
        {
            return redirect()
            ->route("pokemon.index")
            ->with("error", "Vous ne pouvez pas modifier un Pokémon si vous n'êtes pas connnecté.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty(session('username')))
        {
            Pokemon::findOrfail($id)->delete();
            return redirect()
                ->route("pokemon.index")
                ->with("success", "Pokemon deleted successfully");
        }
        else
        {
            return redirect()
            ->route("pokemon.index")
            ->with("error", "Vous ne pouvez pas supprimer un Pokémon si vous n'êtes pas connnecté.");
        }
    }

    public function action(Request $request)
    {
        $data = $request->search;

        $pokemon = Pokemon::select("*")
                        ->where('name', 'LIKE', '%'.$data.'%')
                        ->with("types")->paginate(5);

        return view("pokemon.index", compact("pokemon"))->with(
            "i",
            (request()->input("page", 1) - 1) * 5
        , ["search" => $data]);
    }

}
