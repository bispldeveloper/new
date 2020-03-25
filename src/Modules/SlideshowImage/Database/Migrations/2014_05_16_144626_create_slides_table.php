<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('slideshow_id')->unsigned();
            $table->string('image');
            $table->string('image_tablet')->nullable();
            $table->string('image_mobile')->nullable();
            $table->string('headline')->nullable();
            $table->string('sub_text')->nullable();
            $table->string('link_to')->nullable();
            $table->string('alt_text')->nullable();
            $table->integer('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('slideshow_id')->references('id')->on('slideshows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('slides');
    }
}
