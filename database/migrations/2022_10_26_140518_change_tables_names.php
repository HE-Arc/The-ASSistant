<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('typesdamage', 'damage_types');
        Schema::rename('pokemontypes', 'pokemon_types');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('damage_types', 'typesdamage');
        Schema::rename('pokemon_types', 'pokemontypes');
    }
};
