<?php

class CategoryTableSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    for ($i = 0; $i < 10; $i++)
    {
      $name = ucwords($faker->word);
      
      Category::create([
        "name" => $name
      ]);
    }
  }
}