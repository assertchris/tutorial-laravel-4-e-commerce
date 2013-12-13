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
      $table->integer("category_id");
      $table->string("name");
      $table->integer("stock");
      $table->float("price");
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::dropIfExists("product");
  }
}