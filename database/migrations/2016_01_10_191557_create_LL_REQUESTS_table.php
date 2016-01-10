<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLLREQUESTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LL_REQUESTS', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LL_R_EMAIL',100);
            $table->string('LL_R_STATE',100);
            $table->string('LL_R_CITY',100);
            $table->string('LL_R_AREA',100);
            $table->integer('LL_R_STATUS')->default(0); //0 pending :: 1 approved :: 2 declined
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
        Schema::drop('LL_REQUESTS');
    }
}
