<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/Types.csv"), "r");

        $firstRow = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstRow) {
                Types::create([
                    "name" => $data[0],
                    "color" => $data[1],
                ]);
            }
        }
        fclose($csvFile);
    }
}
