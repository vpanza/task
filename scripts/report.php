<?php

//TODO print formatted report

use Fpdf\Fpdf;

define('EURO', chr(128));

require_once __DIR__ . '/../bootstrap/app.php';

if(count($argv)<=1){
    echo "Devi specificare il customer id";
    return;
}
$customer_id = $argv[1];

// crea PDF

$pdf = new Fpdf();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Report');
$pdf->Ln();

$pdf->Ln(5);

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(20, 7, 'Customer', 1);
$pdf->Cell(40, 7, 'Date', 1);
$pdf->Cell(50, 7, 'Value', 1);
$pdf->Ln();

$pdf->SetFont('Helvetica', '', 10);

//$pdf = $container->get('pdf');
$customer = $container->get('customer');
foreach ($customer->getTransactions() as $transaction) {

    // print_r($transaction);
    if ($transaction['customer'] == $customer_id) {
        $pdf->Cell(20, 7, $transaction['customer'], 1);
        $pdf->Cell(40, 7, $transaction['date'], 1);

        // formattazione italiana
        $pdf->Cell(50, 7, EURO . ' ' . number_format($transaction['value'], 2, ',', '.'), 1, 0, 'R');
        $pdf->Ln();
    }
}

$pdf->Output('example1.pdf','F');
