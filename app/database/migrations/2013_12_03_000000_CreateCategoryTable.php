<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable
extends Migration
{
  public function up()
  {
    Schema::create("category", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->string("name");
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::dropIfExists("category");
  }
}