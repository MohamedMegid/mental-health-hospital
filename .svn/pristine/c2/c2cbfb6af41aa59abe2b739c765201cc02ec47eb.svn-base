<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_reply', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('med_id')->unsigned()->index();
            $table->foreign('med_id')->references('id')->on('med_consulting')->onDelete('cascade');
            $table->text('reply_message');
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
        Schema::drop('med_reply');
    }
}
