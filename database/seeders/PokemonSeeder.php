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
        Pokemon::truncate();
        $csvFile = fopen(base_path("database/data/Pokemon.csv"), "r");

        $firstRow = true;
        /* Reading the csv file and inserting the data into the database. */
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstRow) {
                Pokemon::create([
                    "name" => $data[0],
                    "hp" => $data[1],
                    "attack" => $data[2],
                    "defense" => $data[3],
                    "special_attack" => $data[4],
                    "special_defense" => $data[5],
                    "speed" => $data[6],
                    "number"=>$data[7],
                ]);
            }
            $firstRow = false;
        }
        fclose($csvFile);
    }
}
