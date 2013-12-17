<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductTable
extends Migration
{
  public function up()
  {
    Schema::create("product", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->string("name");
      $table->integer("stock");
      $table->float("price");
      $table->integer("category_id");
      $table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at");
    });
  }

  public function down()
  {
    Schema::dropIfExists("product");
  }
}