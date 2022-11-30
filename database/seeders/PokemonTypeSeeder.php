<?php

namespace Database\Seeders;

use App\Models\PokemonType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PokemonType::truncate();
        $csvFile = fopen(base_path("database/data/PokemonTypes.csv"), "r");

        $firstRow = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstRow) {
                PokemonType::create([
                    "pokemon_id" => $data[0],
                    "type_id" => $data[1],
                ]);
            }
            $firstRow = false;
        }
        fclose($csvFile);
    }
}
