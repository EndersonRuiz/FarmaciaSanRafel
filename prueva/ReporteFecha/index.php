<?php
	require('../fpdf/fpdf.php');
    require('../model/venta1.php');
    $model = new VentasSanJuan1();
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(15,6,'FechaV',1,0,'C',1);
	$pdf->Cell(20,6,'CodigoBarra',1,0,'C',1);
	$pdf->Cell(95,6,'Medicamento',1,0,'C',1);	
	$pdf->Cell(15,6,'Existencia',1,0,'C',1);
	$pdf->Cell(15,6,'Estante',1,0,'C',1);
	$pdf->Cell(15,6,'Seccion',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	foreach ($model->ListarReporteFecha($_REQUEST['ReporteFecha1'],$_REQUEST['ReporteFecha2']) as $r) 
	{
		$pdf->SetFont('Arial','B',5);
		$pdf->Cell(15,4,utf8_decode($r->FechaVencimiento),1,0,'C');
		$pdf->Cell(20,4,utf8_decode($r->CodigoBarra),1,0,'C');
		$pdf->Cell(95,4,utf8_decode($r->NombreProducto),1,0,'C');
		$pdf->Cell(15,4,utf8_decode($r->Existencia),1,0,'C');
		$pdf->Cell(15,4,utf8_decode($r->Estante),1,0,'C');
		$pdf->Cell(15,4,utf8_decode($r->Seccion),1,1,'C');
	}
	
	$pdf->Output();
?>