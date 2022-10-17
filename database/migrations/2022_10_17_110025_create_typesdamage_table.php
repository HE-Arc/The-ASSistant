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
        Schema::create("typesdamage", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("offensetype_id")
                ->references("id")
                ->on("types")
                ->constrained()
                ->onDelete("cascade");
            $table
                ->foreignId("defensetype_id")
                ->references("id")
                ->on("types")
                ->constrained()
                ->onDelete("cascade");
            $table->integer("damagemultiplier");
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
        Schema::dropIfExists("typesdamage");
    }
};
