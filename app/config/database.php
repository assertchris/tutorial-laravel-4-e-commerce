<?php

return [
  "fetch"       => PDO::FETCH_CLASS,
  "default"     => "mysql",
  "connections" => [
    "mysql" => [
      "driver"    => "mysql",
      "host"      => "localhost",
      "database"  => "dev",
      "username"  => "dev",
      "password"  => "dev",
      "charset"   => "utf8",
      "collation" => "utf8_unicode_ci",
      "prefix"    => ""
    ]
  ],
  "migrations" => "migration"
];