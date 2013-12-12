<?php

namespace Formativ\Billing;

use DOMPDF;
use View;

class PDFDocument
implements DocumentInterface
{
  public function create($order)
  {
    $view = View::make("email/invoice", [
      "order" => $order
    ]);

    define("DOMPDF_ENABLE_AUTOLOAD", false);

    require_once base_path() . "/vendor/dompdf/dompdf/dompdf_config.inc.php";

    $dompdf = new DOMPDF();
    $dompdf->load_html($view);
    $dompdf->set_paper("a4", "portrait");

    $dompdf->render();
    $results = $dompdf->output();

    $temp = storage_path() . "/order-" . $order->id . ".pdf";
    file_put_contents($temp, $results);

    return $temp;
  }
}