<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\NavMenuItem\Models\NavMenuItem;

class CreateNavmenuitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navmenuitems', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('navmenu_id')->unsigned();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('filename');
            $table->string('caption')->nullable();
            $table->boolean('is_main')->default(false);
            $table->integer('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('navmenu_id')->references('id')->on('navmenus')->onDelete('cascade');
        });
    
        $items = [
            [
                'navmenu_id' => 1,
                'filename'   => '/',
                'type'       => 'internal',
                'title'      => 'Home'
            ],
            [
                'navmenu_id' => 1,
                'filename'   => '/privacy-policy',
                'type'       => 'internal',
                'title'      => 'Privacy Policy'
            ],
            [
                'navmenu_id' => 1,
                'filename'   => '/contact-us',
                'type'       => 'other',
                'title'      => 'Contact'
            ],
        ];
    
        foreach($items as $item) {
            NavMenuItem::create($item);
        }
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('navmenuitems');
    }
    
}
