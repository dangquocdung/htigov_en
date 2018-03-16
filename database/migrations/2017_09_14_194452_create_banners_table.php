<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id');
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->text('details_vi')->nullable();
            $table->text('details_en')->nullable();
            $table->text('code')->nullable();
            $table->string('file_vi')->nullable();
            $table->string('file_en')->nullable();
            $table->tinyInteger('video_type')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('link_url')->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('status');
            $table->integer('visits');
            $table->integer('row_no');
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
        Schema::dropIfExists('banners');
    }
}
