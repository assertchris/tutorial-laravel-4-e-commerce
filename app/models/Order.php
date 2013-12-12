<?php

class Order
extends Eloquent
{
  protected $table = "order";

  protected $guarded = ["id"];

  protected $softDelete = true;

  public function account()
  {
    return $this->belongsTo("Account");
  }

  public function orderItems()
  {
    return $this->hasMany("OrderItem");
  }

  public function products()
  {
    return $this->belongsToMany("Product", "order_item");
  }

  public function getTotalAttribute()
  {
    $total = 0;

    foreach ($this->orderItems as $orderItem)
    {
     $total += $orderItem->price * $orderItem->quantity;
    }

    return $total;
  }
}