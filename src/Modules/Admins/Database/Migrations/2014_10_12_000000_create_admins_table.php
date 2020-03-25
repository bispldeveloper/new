<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\Admins\Models\Admin;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('admingroup_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Admin::create([
            "username" => "eyeweb",
            "admingroup_id" => "1",
            "first_name" => 'Eye',
            "last_name" => 'Web',
            "password" => bcrypt('Slash830M'),
            "email" => "develop@eyeweb.co.uk",
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
