<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\MarketingSettings\Models\MarketingSetting;

class CreateMarketingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('marketingsettings', function(Blueprint $table) {
            $table->increments('id');
            $table->string('setting');
            $table->text('value')->nullable();
            $table->timestamps();
        });

        $settings = [
            [
                'setting' => 'google_tagmanager_code',
                'value' => ''
            ],
            [
                'setting' => 'google_analytics_code',
                'value' => ''
            ],
            [
                'setting' => 'meta_suffix',
                'value' => '- Mission Control'
            ],
        ];

        foreach($settings as $setting) {
            MarketingSetting::create($setting);
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketingsettings');
    }
}
