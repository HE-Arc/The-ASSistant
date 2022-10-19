<?php

namespace Database\Seeders;

use App\Models\Pokemon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database\data\Pokemons.csv"), "r");

        /*
,
            [
                "name" => "Psyduck",
                "hp" => 50,
                "attack" => 52,
                "defense" => 48,
                "special_attack" => 65,
                "special_defense" => 50,
                "speed" => 55,
            ]
        */

        $firstRow = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            var_dump($data);
            if (!$firstRow) {
                Pokemon::create([
                    "name" => $data[0],
                    "hp" => $data[1],
                    "attack" => $data[2],
                    "defense" => $data[3],
                    "special_attack" => $data[4],
                    "special_defense" => $data[5],
                    "speed" => $data[6],
                ]);
            }
            $firstRow = false;
        }
        fclose($csvFile);
    }
}
