<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Types;
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
        $pokemon = Pokemon::latest()->paginate(5);

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
        $types = Types::all();
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
            "name" => "required",
            "hp" => "required|integer|gte:0|lte:255",
            "attack" => "required|integer|gte:0|lte:255",
            "defense" => "required|integer|gte:0|lte:255",
            "special_attack" => "required|integer|gte:0|lte:255",
            "special_defense" => "required|integer|gte:0|lte:255",
            "speed" => "required|integer|gte:0|lte:255",
        ]);
        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->hp = $request->hp;
        $pokemon->attack = $request->attack;
        $pokemon->defense = $request->defense;
        $pokemon->special_attack = $request->special_attack;
        $pokemon->special_defense = $request->special_defense;
        $pokemon->speed = $request->speed;
        $pokemon->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
