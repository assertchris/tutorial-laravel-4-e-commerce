<?php

namespace Formativ\Billing;

interface GatewayInterface
{
  public function pay(
    $number,
    $expiry,
    $amount,
    $currency
  );
}