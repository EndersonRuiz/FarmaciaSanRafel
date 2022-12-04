<?php
	include 'Reportes/Plantilla/Salidas.php';
	
	$model = new Kardex();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,6,'Sucursales y usuarios involucrados en el pedido',0,1,'C',1);
	
	$pdf->Ln();


	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,6,'Usuario que envia',0,0,'J',0);
	$pdf->Cell(50,6,'Sucursal que envia',0,1,'J',0);

	foreach ($model->Envia() as $r) 
	{	$pdf->SetFont('Arial','',8);
		$pdf->Cell(60,6,utf8_decode($r->PrimerNombre." ".$r->SegundoNombre." ".$r->PrimerApellido." ".$r->SegundoApellido),0,0,'J');
		$pdf->Cell(50,6,utf8_decode($r->Nombre),0,1,'J');
	}


	$pdf->SetFont('Arial','B',10);
	//$pdf->Cell(60,6,'Usuario que recibe',0,0,'J',0);
	$pdf->Cell(50,6,'Sucursal que recibe',0,1,'J',0);

	foreach ($model->Recibe() as $r) 
	{	$pdf->SetFont('Arial','',8);
		//$pdf->Cell(60,6,utf8_decode($r->PrimerNombre." ".$r->SegundoNombre." ".$r->PrimerApellido." ".$r->SegundoApellido),0,0,'J');
		$pdf->Cell(50,6,utf8_decode($r->Nombre),0,1,'J');
	}

	$pdf->Ln();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,6,'Datos de Envio',0,1,'C',1);
	
	$pdf->Ln();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(12,6,'Codigo',0,0,'C',0);
	$pdf->Cell(24,6,'Fecha',0,0,'C',0);
	$pdf->Cell(24,6,'Hora',0,0,'C',0);
	$pdf->Cell(25,6,'Estado',0,0,'C',0);
	$pdf->Cell(100,6,'comentario',0,1,'C',0);
	
	
	
	foreach ($model->DatosPedido() as $r) 
	{	$pdf->SetFont('Arial','',8);
		$pdf->Cell(12,6,utf8_decode($r->Codigo),0,0,'C');
		$pdf->Cell(24,6,utf8_decode($r->Fecha),0,0,'C');
		$pdf->Cell(24,6,utf8_decode($r->Hora),0,0,'C');
		$pdf->Cell(25,6,utf8_decode($r->Estado),0,0,'C');
		$pdf->Cell(100,6,utf8_decode($r->Comentario),0,1,'C');
	}

    $pdf->Ln();

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,6,'Productos solicitados/Enviados',0,1,'C',1);

	$pdf->Ln();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(18,6,'Codigo',0,0,'C',0);
	$pdf->Cell(28,6,'CodigoBarra',0,0,'C',0);
	$pdf->Cell(100,6,'Producto',0,0,'C',0);
	$pdf->Cell(25,6,'PrecioVenta',0,0,'C',0);
	$pdf->Cell(15,6,'Cantidad',0,1,'C',0);

	foreach ($model->DetallePedido() as $r) 
	{	$pdf->SetFont('Arial','',8);
		$pdf->Cell(18,6,utf8_decode($r->Codigo),0,0,'C');
		$pdf->Cell(28,6,utf8_decode($r->CodigoBarra),0,0,'C');
		$pdf->Cell(100,6,utf8_decode($r->NombreProducto),0,0,'C');
		$pdf->Cell(25,6,utf8_decode($r->PrecioVenta),0,0,'C');
		$pdf->Cell(15,6,utf8_decode($r->Cantidad),0,1,'C');
	}
	
	$pdf->Output();
?>