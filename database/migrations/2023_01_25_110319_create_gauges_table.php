<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gauges', function (Blueprint $table) {
            $table->id();
            $table->text('file');
            $table->string('title');
            $table->smallInteger('week');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('part_id')->constrained();
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
        Schema::dropIfExists('gauges');
    }
}
