<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable
extends Migration
{
  public function up()
  {
    Schema::create("order_item", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->integer("order_id");
      $table->integer("product_id");
      $table->integer("quantity");
      $table->float("price");
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::dropIfExists("order_item");
  }
}