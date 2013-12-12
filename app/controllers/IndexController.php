<?php

class IndexController
extends BaseController
{
  public function indexAction()
  {
    return View::make("index");
  }
}