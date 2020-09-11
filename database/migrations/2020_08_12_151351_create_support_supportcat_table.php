<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportSupportCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_supportcat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('support_id')->unsigned();
            $table->integer('supportcat_id')->unsigned();
            $table->foreign('support_id')->references('id')->on('supports')->onDelete('cascade');
            $table->foreign('supportcat_id')->references('id')->on('supportcats')->onDelete('cascade');
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
        Schema::dropIfExists('support_supportcat');
    }
}
