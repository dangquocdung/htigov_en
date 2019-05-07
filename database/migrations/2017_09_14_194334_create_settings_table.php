<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title_vi');
            $table->string('site_title_en');
            $table->string('site_desc_vi');
            $table->string('site_desc_en');
            $table->text('site_keywords_vi');
            $table->text('site_keywords_en');
            $table->string('site_webmails');
            $table->tinyInteger('notify_messages_status')->nullable();
            $table->tinyInteger('notify_comments_status')->nullable();
            $table->tinyInteger('notify_orders_status')->nullable();
            $table->string('site_url');
            $table->tinyInteger('site_status');
            $table->text('close_msg');
            $table->string('social_link1');
            $table->string('social_link2');
            $table->string('social_link3');
            $table->string('social_link4');
            $table->string('social_link5');
            $table->string('social_link6');
            $table->string('social_link7');
            $table->string('social_link8');
            $table->string('social_link9');
            $table->string('social_link10');
            $table->string('contact_t1_vi');
            $table->string('contact_t1_en');
            $table->string('contact_t3');
            $table->string('contact_t4');
            $table->string('contact_t5');
            $table->string('contact_t6');
            $table->string('contact_t7_vi');
            $table->string('contact_t7_en');

            $table->string('style_logo_vi')->nullable();
            $table->string('style_logo_en')->nullable();
            $table->string('style_fav')->nullable();;
            $table->string('style_apple')->nullable();
            $table->string('style_color1')->nullable();
            $table->string('style_color2')->nullable();
            $table->tinyInteger('style_type')->nullable();
            $table->tinyInteger('style_bg_type')->nullable();
            $table->string('style_bg_pattern')->nullable();
            $table->string('style_bg_color')->nullable();
            $table->string('style_bg_image')->nullable();
            $table->tinyInteger('style_subscribe')->nullable();
            $table->tinyInteger('style_footer')->nullable();
            $table->string('style_footer_bg')->nullable();
            $table->tinyInteger('style_preload')->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
