<?php

class DatabaseSeeder
extends Seeder
{
  protected $faker;

  public function getFaker()
  {
    if (empty($this->faker))
    {
      $faker = Faker\Factory::create();
      $faker->addProvider(new Faker\Provider\Base($faker));
      $faker->addProvider(new Faker\Provider\Lorem($faker));
    }

    return $this->faker = $faker;
  }

  public function run()
  {
    $this->call("AccountTableSeeder");
    $this->call("CategoryTableSeeder");
    $this->call("ProductTableSeeder");
    $this->call("OrderTableSeeder");
    $this->call("OrderItemTableSeeder");
  }
}