<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_name');
            $table->text('description');
            $table->text('data');
            $table->integer('rank');
            $table->integer('user_profiles_id');
            $table->integer('user_file_types_id');
            $table->foreign('user_profiles_id')->references('id')->on('user_profiles');
            $table->foreign('user_file_types_id')->references('id')->on('user_file_types');
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
        Schema::dropIfExists('user_files');
    }
}
