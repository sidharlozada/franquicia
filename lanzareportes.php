<?php
    include_once "pdf\dompdf\autoload.inc.php";
    use Dompdf\Dompdf;
    $pdf = new Dompdf();
    ob_start();
    $modulo = $_GET["modulo"];
    include_once "report/$modulo";
    $contenido = ob_get_clean();
    $pdf->loadHtml($contenido);
    $pdf->setPaper("A4","landscape");
    $pdf->render();
    $pdf->stream('impresion.pdf');
?>