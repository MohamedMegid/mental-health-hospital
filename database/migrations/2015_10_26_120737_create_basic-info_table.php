<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_info', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('org_spec');
            $table->string('org_name');
            $table->string('basic_photo');
            $table->string('photo');
            $table->string('title1');            
            $table->text('subject1');
            $table->string('title2');            
            $table->text('subject2');
            $table->string('title3');            
            $table->text('subject3');
            $table->string('title4');            
            $table->text('subject4');
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
        Schema::drop('basic_info');
    }
}
