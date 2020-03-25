<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagetemplateblocksContentTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('pagetemplateblocks_content', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->integer('page_tb_id')->unsigned();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        DB::unprepared('ALTER TABLE `pagetemplateblocks_content` DROP PRIMARY KEY, ADD PRIMARY KEY (`id`, `page_id`, `page_tb_id`)');
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('pagetemplateblocks_content');
    }
}
