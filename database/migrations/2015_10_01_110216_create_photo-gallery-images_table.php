<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pgallery_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('pgallery_id')->unsigned()->index();
            $table->foreign('pgallery_id')->references('id')->on('photo_gallery')->onDelete('cascade');
            $table->string('images');
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
        Schema::drop('pgallery_images');
    }
}
