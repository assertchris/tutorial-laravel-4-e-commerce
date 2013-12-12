<?php

class OrderItemTableSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    $orders   = Order::all();
    $products = Product::all()->toArray();

    foreach ($orders as $order)
    {
      $used = [];

      for ($i = 0; $i < rand(1, 5); $i++)
      {
        $product  = $faker->randomElement($products);

        if (!in_array($product["id"], $used))
        {
          $id       = $product["id"];
          $price    = $product["price"];
          $quantity = $faker->randomNumber(1, 3);
          
          OrderItem::create([
            "order_id"   => $order->id,
            "product_id" => $id,
            "price"      => $price,
            "quantity"   => $quantity
          ]);

          $used[] = $product["id"];
        }
      }
    }
  }
}