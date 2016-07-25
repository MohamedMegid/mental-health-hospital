<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgalleryVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vgallery_videos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('vgallery_id')->unsigned()->index();
            $table->foreign('vgallery_id')->references('id')->on('video_gallery')->onDelete('cascade');
            $table->string('name');
            $table->string('link');            
            $table->text('summary');
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
        Schema::drop('vgallery_videos');
    }
}
