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
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::dropIfExists("account");
  }
}