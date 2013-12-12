<?php

namespace Formativ\Billing;

use App;
use Illuminate\Support\ServiceProvider;

class BillingServiceProvider
extends ServiceProvider
{
  protected $defer = true;

  public function register()
  {
    App::bind("billing.stripeGateway", function() {
      return new StripeGateway();
    });

    App::bind("billing.pdfDocument", function() {
      return new PDFDocument();
    });

    App::bind("billing.emailMessenger", function() {
      return new EmailMessenger();
    });
  }

  public function provides()
  {
    return [
      "billing.stripeGateway",
      "billing.pdfDocument",
      "billing.emailMessenger"
    ];
  }
}