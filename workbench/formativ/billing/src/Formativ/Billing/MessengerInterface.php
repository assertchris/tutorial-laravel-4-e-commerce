<?php

namespace Formativ\Billing;

interface MessengerInterface
{
  public function send(
    $order,
    $document
  );
}