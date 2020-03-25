<?php

use EyeCore\Modules\PageForms\Models\PageForm;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_module')->nullable()->default(0);
            $table->boolean('has_newsletter')->nullable()->default(0);
            $table->string('newsletter_list_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->text('success_message')->nullable();
            $table->text('conversion_tracking')->nullable();
            $table->string('email_to');
            $table->string('email_from');
            $table->string('email_subject');
            $table->timestamps();
        });

        $pageforms = [
            [
                'has_newsletter' => 1,
                'name' => 'Contact Us',
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'email_to' => 'support@eyeweb.co.uk',
                'email_from' => 'support@eyeweb.co.uk',
                'email_subject' => 'Contact Us enquiry received'
            ]
        ];

        foreach($pageforms as $pageform) {
            PageForm::create($pageform);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_forms');
    }
}
