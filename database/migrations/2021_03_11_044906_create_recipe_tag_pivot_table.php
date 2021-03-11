<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeTagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('recipe_id')->index();
            $table->foreign('recipe_id')->references('id')->on('recipe')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id')->index();
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade');
            $table->primary(['recipe_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_tag');
    }
}
