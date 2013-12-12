<?php

return [
  "driver" => "eloquent",
  "model"  => "Account",
  "table"  => "account",
  "reminder" => [
    "email"  => "email/request",
    "table"  => "token",
    "expire" => 60
  ]
];