<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\SiteSettings\Models\SiteSetting;

class CreateSiteSettingsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function(Blueprint $table) {
            $table->increments('id');
            $table->string('setting');
            $table->text('value');
            $table->string('type')->default('text');
            $table->string('class')->nullable();
            $table->timestamps();
        });

        $sitesettings = [
            [
                'type' => 'text',
                'site_setting' => 'company_number',
                'value' => '',
            ],
            [
                'type' => 'text',
                'site_setting' => 'vat_number',
                'value' => '',
            ],
            [
                'type' => 'text',
                'site_setting' => 'eori_number',
                'value' => '',
            ],
            [
                'type' => 'text',
                'site_setting' => 'telephone',
                'value' => '',
            ],
            [
                'type' => 'text',
                'site_setting' => 'fax',
                'value' => '',
            ],
            [
                'type' => 'text',
                'site_setting' => 'address',
                'value' => '',
            ],
            [
                'setting' => 'admin_email',
                'value' => 'support@eyeweb.co.uk'
            ],
            [
                'setting' => 'contact_email',
                'value' => 'support@eyeweb.co.uk'
            ],
            [
                'setting' => 'contact_phone',
                'value' => '01482 628830'
            ],
            [
                'setting' => 'facebook_url',
                'value' => 'http://www.facebook.com/eyewebsolutions'
            ],
            [
                'setting' => 'twitter_handle',
                'value' => '@eyeweb'
            ],
            [
                'setting' => 'twitter_url',
                'value' => 'http://www.twitter.com/eyeweb'
            ]
        ];

        foreach($sitesettings as $sitesetting) {
            SiteSetting::create($sitesetting);
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('sitesettings');
    }

}
