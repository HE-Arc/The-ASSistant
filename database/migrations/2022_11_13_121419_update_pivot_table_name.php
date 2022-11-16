<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::rename("pokemon_types", "pokemon_type"); // As this is a pivot table, the 's' naming convention is dropped per: https://webdevetc.com/blog/laravel-naming-conventions/#section_pivot-tables
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::rename("pokemon_type", "pokemon_types");
    }
};
