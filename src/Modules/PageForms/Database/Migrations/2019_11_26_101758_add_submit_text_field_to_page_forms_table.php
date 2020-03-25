<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubmitTextFieldToPageFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_forms', function (Blueprint $table) {
            $table->string('submit_text')->after('title')->nullable()->default('Submit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_forms', function (Blueprint $table) {
            $table->dropColumn('submit_text');
        });
    }
}
