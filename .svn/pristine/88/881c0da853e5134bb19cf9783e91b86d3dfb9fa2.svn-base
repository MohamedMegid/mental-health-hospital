<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusFrontendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus_frontend', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('mail');
            $table->string('mobile');
            $table->string('address');
            $table->text('message');
            $table->integer('reply_status');
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
        Schema::drop('contactus_frontend');
    }
}
