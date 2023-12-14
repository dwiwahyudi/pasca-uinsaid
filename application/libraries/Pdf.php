<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once("./vendor/autoload.php");
use Dompdf\Dompdf;

class Pdf {
  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->setBasePath($_SERVER['DOCUMENT_ROOT']);
    $dompdf->set_option('DOMPDF_ENABLE_CSS_FLOAT', true);
    $dompdf->set_option('isRemoteEnabled', TRUE);
    $dompdf->render();
    $canvas = $dompdf->get_canvas();
    $canvas->page_text(500, 817, "Page {PAGE_NUM} of {PAGE_COUNT}", "times new roman", 8, array(0,0,0));
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
    // return $dompdf->output();
        // $dompdf->stream($filename.".pdf", array("Attachment" => 0));

  }
}
