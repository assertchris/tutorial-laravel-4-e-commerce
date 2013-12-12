<?php

class AccountTableSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    for ($i = 0; $i < 10; $i++)
    {
      $email    = $faker->email;
      $password = Hash::make("password");

      Account::create([
        "email"    => $email,
        "password" => $password
      ]);
    }
  }
}