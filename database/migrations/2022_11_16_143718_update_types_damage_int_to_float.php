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
        Schema::table('damage_types', function (Blueprint $table)
        {
            $table->float('damagemultiplier')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('damage_types', function (Blueprint $table)
        {
            $table->integer('damagemultiplier')->change();
        });
    }
};
