<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use EyeCore\Modules\PageTemplates\Models\PageTemplate;

class CreatePagetemplatesTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('pagetemplates', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('published')->default(true);
            $table->string('name', 50);
            $table->string('view_file')->unique();
            $table->timestamps();
            $table->softdeletes();
        });

        $pagetemplates = [
            [
                'published' => 1,
                'name' => 'homepage',
                'view_file' => 'homepage.blade.php'
            ],
            [
                'published' => 1,
                'name' => 'Full Width Page',
                'view_file' => 'full-width-page.blade.php'
            ],
            [
                'published' => 0,
                'name' => 'Contact Us Page',
                'view_file' => 'contact-us.blade.php'
            ]
        ];

        foreach($pagetemplates as $pagetemplate) {
            PageTemplate::create($pagetemplate);
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('pagetemplates');
    }

}
