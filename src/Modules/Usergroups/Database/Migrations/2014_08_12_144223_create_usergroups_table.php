<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use EyeCore\Modules\Usergroups\Models\Usergroup;

class CreateUsergroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usergroups', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->text('permissions')->nullable();
            $table->timestamps();
			$table->softDeletes();
		});
        
        Usergroup::create([
            'name' => 'Customer'
        ]);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usergroups');
	}

}
