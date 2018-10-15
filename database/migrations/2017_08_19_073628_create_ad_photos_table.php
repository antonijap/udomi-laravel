<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPhotosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('ad_photos', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('ad_id')->unsigned();
      $table->foreign('ad_id')->references('id')->on('ads');
      $table->string('filename');
      $table->string('name');
      $table->string('type');
      $table->integer('size');
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
    Schema::dropIfExists('ad_photos');
  }
}
