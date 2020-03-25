<?php

use EyeCore\Modules\PageFormFields\Models\PageFormField;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_form_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('form_id');
            $table->integer('form_field_type_id');
            $table->boolean('is_newsletter_field')->nullable()->default(0);
            $table->string('name');
            $table->boolean('has_label')->nullable()->default(1);
            $table->string('label')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('default')->nullable();
            $table->text('options')->nullable();
            $table->text('content')->nullable();
            $table->integer('sort_order')->default(0)->nullable();
            $table->boolean('required')->default(0)->nullable();
            $table->integer('columns');
            $table->timestamps();
        });

        $pageformfields = [
            [
                'form_id' => 1,
                'form_field_type_id' => 2,
                'is_newsletter_field' => 1,
                'name' => 'First Name',
                'has_label' => 1,
                'label' => 'First Name',
                'required' => 1,
                'columns' => 12
            ],
            [
                'form_id' => 1,
                'form_field_type_id' => 2,
                'is_newsletter_field' => 1,
                'name' => 'Last Name',
                'has_label' => 1,
                'label' => 'Last Name',
                'required' => 1,
                'columns' => 12
            ],
            [
                'form_id' => 1,
                'form_field_type_id' => 5,
                'is_newsletter_field' => 1,
                'name' => 'Email Address',
                'has_label' => 1,
                'label' => 'Email Address',
                'required' => 1,
                'columns' => 12
            ],
            [
                'form_id' => 1,
                'form_field_type_id' => 10,
                'is_newsletter_field' => 1,
                'name' => 'Agree Newsletter',
                'has_label' => 1,
                'label' => 'Please subscribe me to the newsletter',
                'required' => 0,
                'columns' => 12
            ]
        ];

        foreach($pageformfields as $pageformfield) {
            PageFormField::create($pageformfield);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_form_fields');
    }
}
