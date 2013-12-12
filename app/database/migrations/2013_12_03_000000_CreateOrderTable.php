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
      $table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at");
    });
  }

  public function down()
  {
    Schema::dropIfExists("order");
  }
}