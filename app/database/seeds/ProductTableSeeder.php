<?php

class ProductTableSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    $categories = Category::all();

    foreach ($categories as $category)
    {
      for ($i = 0; $i < rand(-1, 10); $i++)
      {
        $name  = ucwords($faker->word);
        $stock = $faker->randomNumber(0, 100);
        $price = $faker->randomFloat(2, 5, 100);

        Product::create([
          "name"        => $name,
          "stock"       => $stock,
          "price"       => $price,
          "category_id" => $category->id
        ]);
      }
    }
  }
}