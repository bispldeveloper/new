<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\NavMenu\Models\NavMenu;

class CreateNavmenusTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navmenus', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('published')->default(true);
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('tree_structure')->nullable();
            $table->integer('sort_order')->unsigned()->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        NavMenu::create([
            'published' => 1,
            'title' => 'Header',
            'description' => 'Main Header Navigation',
            'tree_structure' => '[{"id":1},{"id":2},{"id":3}]'
        ]);
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('navmenus');
    }
    
}
