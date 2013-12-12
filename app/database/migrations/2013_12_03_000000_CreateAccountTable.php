<?php

use Illuminate\Database\Migrations\Migration;

class CreateAccountTable
extends Migration
{
  public function up()
  {
    Schema::create("account", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->string("email");
      $table->string("password");
      $table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at");
    });
  }

  public function down()
  {
    Schema::dropIfExists("account");
  }
}