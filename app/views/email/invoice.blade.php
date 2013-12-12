<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Laravel 4 E-Commerce</title>
    <style type="text/css">

      body {
        padding     : 25px 0;
        font-family : Helvetica;
      }

      td {
        padding : 0 10px 0 0;
      }

      * {
        float : none;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          
        </div>
        <div class="col-md-4 well">
          <table>
            <tr>
              <td class="pull-right">
                <strong>Account</strong>
              </td>
              <td>
                {{ $order->account->email }}
              </td>
            </tr>
            <tr>
              <td class="pull-right">
                <strong>Date</strong>
              </td>
              <td>
                {{ $order->created_at->format("F jS, Y");  }}
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2>Invoice {{ $order->id }}</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order->orderItems as $orderItem)
              <tr>
                <td>
                  {{ $orderItem->product->name }}
                </td>
                <td>
                  {{ $orderItem->quantity }}
                </td>
                <td>
                  $ {{ number_format($orderItem->total, 2) }}
                </td>
              </tr>
            @endforeach
            <tr>
              <td>&nbsp;</td>
              <td>
                <strong>Total</strong>
              </td>
              <td>
                <strong>$ {{ number_format($order->total, 2) }}</strong>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </body>
</html>