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
      $table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at");
    });
  }

  public function down()
  {
    Schema::dropIfExists("category");
  }
}