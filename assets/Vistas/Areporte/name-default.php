<?php
	include 'Reportes/Plantilla/plantillaEntradas.php';
	
	$model = new Existencias();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(5,6,'Cnt.',1,0,'C',1);
	$pdf->Cell(100,6,'Medicamento',1,0,'C',1);	
	$pdf->Cell(22,6,'Envia',1,0,'C',1);
	$pdf->Cell(15,6,'Fecha',1,0,'C',1);
	$pdf->Cell(10,6,'Hora',1,0,'C',1);
	$pdf->Cell(38,6,'Usuario',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
	foreach ($model->ListarReporte1($_REQUEST['Fin'],$_REQUEST['Inicio']) as $r) 
	{
		$pdf->SetFont('Arial','B',5);
		$pdf->Cell(5,6,utf8_decode($r->Cantidad),1,0,'C');
		$pdf->Cell(100,6,utf8_decode($r->NombreProducto),1,0,'C');
		$pdf->Cell(22,6,utf8_decode($r->nombre),1,0,'C');
		$pdf->Cell(15,6,utf8_decode($r->Fecha),1,0,'C');
		$pdf->Cell(10,6,utf8_decode($r->Hora),1,0,'C');
		$pdf->Cell(38,6,utf8_decode($r->NombreCompleto),1,1,'C');
	}
	
	$pdf->Output();
?>