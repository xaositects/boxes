<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('rank');
            $table->text('description');
            $table->integer('user_files_id');
            $table->integer('boxes_id');
            $table->integer('box_item_types_id');
            $table->foreign('user_files_id')->references('id')->on('user_files');
            $table->foreign('boxes_id')->references('id')->on('boxes');
            $table->foreign('box_item_types_id')->references('id')->on('box_item_types');
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
        Schema::dropIfExists('box_items');
    }
}
