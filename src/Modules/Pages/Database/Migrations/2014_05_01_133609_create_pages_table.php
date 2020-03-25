<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use EyeCore\Modules\Pages\Models\Page;

class CreatePagesTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('pagetemplate_id')->unsigned();
            $table->smallInteger('page_form_id')->nullable()->unsigned();
            $table->smallInteger('is_module')->default(0);
            $table->boolean('published');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_canonical')->nullable();
            $table->integer('slideshow_id')->unsigned()->nullable();
            $table->softdeletes();
            $table->timestamps();
        });

        $pages = [
            [
                'pagetemplate_id' => 1,
                'published' => 1,
                'page_form_id' => null,
                'slug' => '/',
                'title' => 'Home'
            ],
            [
                'is_module' => 0,
                'pagetemplate_id' => 3,
                'published' => 1,
                'page_form_id' => 1,
                'slug' => 'contact-us',
                'title' => 'Contact Us'
            ],
            [
                'pagetemplate_id' => 2,
                'published' => 1,
                'page_form_id' => null,
                'slug' => 'privacy-policy',
                'title' => 'Privacy Policy'
            ],
        ];

        foreach($pages as $page) {
            Page::create($page);
        }
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }

}
