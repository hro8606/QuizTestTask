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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('player_first_name');
            $table->string('player_last_name');
            $table->string('email');
            $table->tinyInteger('total_score')->default(0)->unsigned();
            $table->tinyInteger('correct_answers')->default(0)->unsigned();
            $table->dateTime('started_at');
            $table->dateTime('submitted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
