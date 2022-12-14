<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();
        $csvFile = fopen(base_path("database/data/Types.csv"), "r");

        $firstRow = true;
        /* Reading the csv file and inserting the data into the database. */
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstRow) {
                Type::create([
                    "name" => $data[0],
                    "color" => $data[1],
                ]);
            }
            $firstRow = false;
        }
        fclose($csvFile);
    }
}
