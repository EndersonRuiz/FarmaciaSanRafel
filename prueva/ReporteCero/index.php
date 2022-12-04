<?php
	require('../fpdf/fpdf.php');
    require('../model/venta1.php');
    $model = new VentasSanJuan1();
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,6,'CodigoBarra.',1,0,'C',1);
	$pdf->Cell(100,6,'Medicamento',1,0,'C',1);	
	$pdf->Cell(22,6,'Existencia',1,0,'C',1);
	$pdf->Cell(25,6,'Casa',1,0,'C',1);
	$pdf->Cell(25,6,'Marca',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	foreach ($model->ListarReporteCero($_REQUEST['ReporteCero']) as $r) 
	{
		$pdf->SetFont('Arial','B',5);
		$pdf->Cell(20,5,utf8_decode($r->CodigoBarra),1,0,'C');
		$pdf->Cell(100,5,utf8_decode($r->NombreProducto),1,0,'C');
		$pdf->Cell(22,5,utf8_decode($r->Existencia),1,0,'C');
		$pdf->Cell(25,5,utf8_decode($r->Casa),1,0,'C');
		$pdf->Cell(25,5,utf8_decode($r->Marca),1,1,'C');
	}
	
	$pdf->Output();
?>