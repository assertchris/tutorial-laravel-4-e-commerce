<?php

namespace Formativ\Billing;

interface DocumentInterface
{
  public function create($order);
}