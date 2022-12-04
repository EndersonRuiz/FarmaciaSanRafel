<?php
	include 'Reportes/Plantilla/name-default.php';
	
	$model = new Empleados();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,10,'Probando FPDF',0,1,'L');
	$pdf->Cell(22,6,'IdSistema',1,0,'C',1);
	$pdf->Cell(38,6,'Primer Nombre',1,0,'C',1);
	$pdf->Cell(38,6,'Segundo Nombre',1,0,'C',1);
	$pdf->Cell(38,6,'Primer Apellido',1,0,'C',1);
	$pdf->Cell(38,6,'Segundo Apellido',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
	foreach ($model->Reporte() as $r) 
	{
		$pdf->Cell(22,6,utf8_decode($r->Codigo),1,0,'C');
		$pdf->Cell(38,6,utf8_decode($r->PrimerNombre),1,0,'C');
		$pdf->Cell(38,6,utf8_decode($r->SegundoNombre),1,0,'C');
		$pdf->Cell(38,6,utf8_decode($r->PrimerApellido),1,0,'C');
		$pdf->Cell(38,6,utf8_decode($r->SegundoApellido),1,1,'C');
	}
	
	$pdf->Output();
?>