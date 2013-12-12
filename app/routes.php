<?php

App::bind("Formativ\Billing\GatewayInterface", "Formativ\Billing\StripeGateway");
App::bind("Formativ\Billing\DocumentInterface", "Formativ\Billing\PDFDocument");
App::bind("Formativ\Billing\MessengerInterface", "Formativ\Billing\EmailMessenger");

Route::any("/", [
  "as"   => "index/index",
  "uses" => "IndexController@indexAction"
]);

Route::any("category/index", [
  "as"   => "category/index",
  "uses" => "CategoryController@indexAction"
]);

Route::any("product/index", [
  "as"   => "product/index",
  "uses" => "ProductController@indexAction"
]);

Route::any("account/authenticate", [
  "as"   => "account/authenticate",
  "uses" => "AccountController@authenticateAction"
]);

Route::any("order/index", [
  "as"   => "order/index",
  "uses" => "OrderController@indexAction"
]);

Route::any("order/add", [
  "as"   => "order/add",
  "uses" => "OrderController@addAction"
]);

Route::any("order/delete", [
  "as"   => "order/delete",
  "uses" => "OrderController@deleteAction"
]);