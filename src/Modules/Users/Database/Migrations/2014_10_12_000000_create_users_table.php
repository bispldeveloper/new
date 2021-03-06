<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\Users\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('usergroup_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        User::create([
            "usergroup_id" => "1",
            "first_name" => 'Eye',
            "last_name" => 'Web',
            "password" => bcrypt('Test1234'),
            "email" => "develop@eyeweb.co.uk",
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
