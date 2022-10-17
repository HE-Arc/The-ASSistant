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
        Schema::create("pokemon", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("hp")->unsigned();
            $table->integer("attack")->unsigned();
            $table->integer("defense")->unsigned();
            $table->integer("special_attack")->unsigned();
            $table->integer("special_defense")->unsigned();
            $table->integer("speed")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("pokemon");
    }
};
