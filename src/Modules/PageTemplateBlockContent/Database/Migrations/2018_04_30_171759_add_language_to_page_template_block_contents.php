<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguageToPageTemplateBlockContents extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('pagetemplateblocks_content', function(Blueprint $table) {
            $table->string('language')->default('en')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('pagetemplateblocks_content', function(Blueprint $table) {
            $table->dropColumn('language');
        });
    }
}
