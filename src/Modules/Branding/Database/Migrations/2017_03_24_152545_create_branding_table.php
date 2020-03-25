<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\Branding\Models\Branding;

/**
 * Class CreateBrandingTable
 */
class CreateBrandingTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('branding', function(Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();
            $table->string('dashboard_banner')->nullable();
            $table->string('auth_background')->nullable();
            $table->string('offcanvas_bg')->nullable();
            $table->string('link_color')->nullable();
            $table->string('link_hover_bg')->nullable();
            $table->string('active_link_color')->nullable();
            $table->string('active_link_bg')->nullable();
            $table->string('active_link_border_color')->nullable();
            $table->string('submenu_bg')->nullable();
            $table->string('submenu_link_color')->nullable();
            $table->string('submenu_link_hover_bg')->nullable();
            $table->string('submenu_active_link_bg')->nullable();
            $table->string('submenu_active_link_color')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Branding::create([
            'offcanvas_bg' => '#fff',
            'link_color' => '#c7c7c7',
            'link_hover_bg' => '#373737',
            'active_link_color' => '#fff',
            'active_link_bg' => '#000',
            'active_link_border_color' => '#efcc0a',
            'submenu_bg' => '#000',
            'submenu_link_color' => '#c7c7c7',
            'submenu_link_hover_bg' => '#373737',
            'submenu_active_link_bg' => '#efcc0a',
            'submenu_active_link_color' => '#000',
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('branding');
    }
}
