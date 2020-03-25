<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTemplateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagetemplate_blocks', function(Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('pagetemplate_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('field_name');
            $table->string('description')->nullable();
            $table->string('class')->nullable();
            $table->string('type');
            $table->integer('sort_order')->default(0);
            $table->softdeletes();
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
        Schema::drop('pagetemplate_blocks');
    }
}
