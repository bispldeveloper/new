<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use EyeCore\Modules\Admingroups\Models\Admingroup;

class CreateAdmingroupsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('admingroups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('permissions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $admingroups = [
            [
                'name' => 'Developer'
            ],
            [
                'name' => 'Site Admin',
                'permissions' => '{"mc-admin.pages.index":"on","mc-admin.pages.edit":"on","mc-admin.pages.destroy":"on","mc-admin.pages.create":"on","mc-admin.slideshows.index":"on","mc-admin.slideshows.edit":"on","mc-admin.slideshows.destroy":"on","mc-admin.slideshows.create":"on","mc-admin.navmenus.index":"on","mc-admin.navmenus.edit":"on","mc-admin.navmenus.destroy":"on","mc-admin.navmenus.create":"on","mc-admin.sitesettings.index":"on","mc-admin.sitesettings.edit":"on","mc-admin.sitesettings.destroy":"on","mc-admin.sitesettings.create":"on","mc-admin.enquiries.index":"on","mc-admin.enquiries.show":"on","mc-admin.admins.index":"on","mc-admin.admins.edit":"on","mc-admin.admins.destroy":"on","mc-admin.admins.create":"on","mc-admin.admins.changepassword":"on","mc-admin.admingroups.index":"on","mc-admin.admingroups.edit":"on","mc-admin.admingroups.destroy":"on","mc-admin.admingroups.create":"on"}'
            ],
            [
                'name' => 'Content Editor',
                'permissions' => '{"mc-admin.pages.index":"on","mc-admin.pages.edit":"on","mc-admin.pages.destroy":"on","mc-admin.pages.create":"on","mc-admin.slideshows.index":"on","mc-admin.slideshows.edit":"on","mc-admin.slideshows.destroy":"on","mc-admin.slideshows.create":"on","mc-admin.navmenus.index":"on","mc-admin.navmenus.edit":"on","mc-admin.navmenus.destroy":"on","mc-admin.navmenus.create":"on","mc-admin.enquiries.index":"on","mc-admin.enquiries.show":"on"}'
            ]
        ];

        foreach($admingroups as $usergroup) {
            Admingroup::create($usergroup);
        }
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('admingroups');
    }

}
