<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('summary');
            $table->text('subject');
            $table->string('basic_photo');
            $table->integer('importance');
            $table->integer('category_id');
            $table->integer('visits');
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
        Schema::drop('news');
    }
}
