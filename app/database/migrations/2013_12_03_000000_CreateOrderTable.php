<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderTable
extends Migration
{
  public function up()
  {
    Schema::create("order", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->integer("account_id");
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::dropIfExists("order");
  }
}