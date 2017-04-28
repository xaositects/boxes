<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('rank');
            $table->text('description');
            $table->integer('user_profiles_id');
            $table->integer('box_types_id');
            $table->foreign('user_profiles_id')->references('id')->on('user_profiles');
            $table->foreign('box_types_id')->references('id')->on('box_types');
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
        Schema::dropIfExists('boxes');
    }
}
