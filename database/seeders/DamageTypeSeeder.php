<?php

namespace Database\Seeders;

use App\Models\DamageType;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DamageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DamageType::truncate();
        $csvFile = fopen(base_path("database/data/DamageTypes.csv"), "r");

        $firstRow = true;
        /* Reading the csv file and inserting the data into the database. */
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstRow) {
                DamageType::create([
                    "offensetype_id" => $data[0],
                    "defensetype_id" => $data[1],
                    "damagemultiplier" => $data[2]
                ]);
            }
            $firstRow = false;
        }
        fclose($csvFile);
    }
}
