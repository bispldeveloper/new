<?php

use EyeCore\Modules\PageFormFieldTypes\Models\PageFormFieldType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageFormFieldTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_form_field_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('has_options')->nullable()->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('partial');
            $table->timestamps();
        });

        $pageformfieldtypes = [
            ['name' => 'Content', 'has_options' => 0, 'partial' => 'content'],
            ['name' => 'Text', 'has_options' => 0, 'partial' => 'text'],
            ['name' => 'Text Area', 'has_options' => 0, 'partial' => 'textarea'],
            ['name' => 'Select', 'has_options' => 1, 'partial' => 'select'],
            ['name' => 'Email', 'has_options' => 0, 'partial' => 'email'],
            ['name' => 'Number', 'has_options' => 0, 'partial' => 'number'],
            ['name' => 'Date', 'has_options' => 0, 'partial' => 'date'],
            ['name' => 'Time', 'has_options' => 0, 'partial' => 'time'],
            ['name' => 'Radio', 'has_options' => 1, 'partial' => 'radio'],
            ['name' => 'Checkbox', 'has_options' => 0, 'partial' => 'checkbox'],
            ['name' => 'Label', 'has_options' => 0, 'partial' => 'label'],
        ];

        foreach($pageformfieldtypes as $pageformfieldtype) {
            PageFormFieldType::create($pageformfieldtype);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_form_field_types');
    }
}
