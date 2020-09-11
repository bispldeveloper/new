<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use EyeCore\Modules\Branding\Models\Branding;

class UpdateBrandingTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('branding', function(Blueprint $table) {
            $table->dropColumn([
                'link_color',
                'link_hover_bg',
                'active_link_color',
                'active_link_bg',
                'active_link_border_color',
                'submenu_bg',
                'submenu_link_color',
                'submenu_link_hover_bg',
                'submenu_active_link_bg',
                'submenu_active_link_color'
            ]);
            $table->string('offcanvas_heading_link_color')->nullable()->after('offcanvas_bg');
            $table->string('offcanvas_link_color')->nullable()->after('offcanvas_heading_link_color');
            $table->string('offcanvas_link_color_active')->nullable()->after('offcanvas_link_color');
            $table->string('offcanvas_link_background_color_active')->nullable()->after('offcanvas_link_color_active');
            $table->string('offcanvas_link_icon_color_active')->nullable()->after('offcanvas_link_background_color_active');
            $table->string('topbar_bg')->nullable()->after('offcanvas_link_icon_color_active');
            $table->string('topbar_link_color')->nullable()->after('topbar_bg');
            $table->string('topbar_link_color_hover')->nullable()->after('topbar_link_color');
        });

        Branding::truncate();
        Branding::create([
            'offcanvas_bg' => '#FFF',
            'offcanvas_heading_link_color' => '#272625',
            'offcanvas_link_color' => '#A2A2A2',
            'offcanvas_link_color_active' => '#FFF',
            'offcanvas_link_background_color_active' => '#272625',
            'offcanvas_link_icon_color_active' => '#FFCE00',
            'topbar_bg' => '#272625',
            'topbar_link_color' => '#fff',
            'topbar_link_color_hover' => '#FFCE00',
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('branding', function(Blueprint $table) {
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
            $table->dropColumn([
                'offcanvas_heading_link_color',
                'offcanvas_link_color',
                'offcanvas_link_color_active',
                'offcanvas_link_background_color_active',
                'offcanvas_link_icon_color_active',
                'topbar_bg',
                'topbar_link_color',
                'topbar_link_color_hover',
            ]);
        });

        Branding::truncate();
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
}
