<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageFormEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_form_enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('page_form_id');
            $table->string('status')->nullable()->default('received');
            $table->string('referral_url');
            $table->text('fields');
            $table->string('email_from');
            $table->string('email_to');
            $table->string('ip_address');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('page_form_enquiries');
    }
}
