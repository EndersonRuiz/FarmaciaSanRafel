<?php
	require('../fpdf/fpdf.php');
    require('../model/venta1.php');
    $model = new VentasSanJuan1();
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    if($_POST['SucursalBs'] == '4'){
	foreach ($model->ReportedeCorteCaja($_POST['SucursalBs'],$_POST['FechaInicios'],$_POST['Turnoss']) as $r) 
	{

    $pdf->SetFont('Arial','B',15);
	$pdf->Cell(30);
	$pdf->Cell(120,10,utf8_decode($r->Sucursala),0,0,'C');
	$pdf->Ln(20);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'Nombre del Cajero(a):_______________________________',0,0,'L',0);
	$pdf->Cell(80,6,utf8_decode($r->NombreCompleto),0,0,'C');
	$pdf->Cell(10,6,'Turno :___________________',0,0,'L',0);
	$pdf->Cell(0,6,utf8_decode($r->Turnos),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(16,6,'Hora Entrada:_____________',0,0,'L',0);
	$pdf->Cell(47,6,utf8_decode($r->HoraEntro),0,0,'C');
	$pdf->Cell(15,6,'Hora Salida:_____________',0,0,'L',0);
	$pdf->Cell(43,6,utf8_decode($r->Hora),0,0,'C');
	$pdf->Cell(15,6,'Fecha:___________________',0,0,'L',0);
	$pdf->Cell(0,6,utf8_decode($r->FechaEntro),0,0,'C');
    $pdf->Ln(10);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,6,'BILLETES',0,0,'C',0);
	$pdf->Ln(10);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'De 200.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete200),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete200 * 200),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De 100.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete100),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete100 * 100),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   50.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete50),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete50 * 50),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   20.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete20),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete20 * 20),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   10.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete10),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete10 * 10),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     5.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete5),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete5 * 5),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     1.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete1),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete1),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'    SUMA TOTAL DE BILLETES                                          Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaBilletes),0,0,'C');
    $pdf->Ln(20);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,6,'MONEDAS',0,0,'C',0);
	$pdf->Ln(10);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'De     1.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda1),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda1),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     0.50:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda50),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda50 * 0.50),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     0.25:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda25),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda25 * 0.25),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'    SUMA TOTAL DE MONEDAS                                          Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaMonedas),0,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6,'SUMA TOTAL DE EFECTIVO.............................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaMonedas + $r->TotalSumaBilletes),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'SUMA TOTAL VALES.........................................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSalidas),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'TOTAL DE INGRESOS........................................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Total),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(45,6,'TOTAL DE VENTA :Q. ',0,0,'L',1);
	$pdf->Cell(20,6,utf8_decode($r->TotalVenta),0,0,'C',1);
	$pdf->Ln(9);
    $pdf->Ln(20);

    $Faltante = ($r->TotalVenta - ($r->TotalSumaMonedas + $r->TotalSumaBilletes + $r->TotalSalidas));
    $Sobrante = (($r->TotalSumaMonedas + $r->TotalSumaBilletes + $r->TotalSalidas) - $r->TotalVenta);
    if($Faltante > 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode($Faltante),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode(0),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }else if($Sobrante > 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode(0),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode($Sobrante),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }else if($Faltante == 0 && $Sobrante == 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode($Faltante),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode($Sobrante),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }
    
	}
	}else if($_POST['SucursalBs'] == '5'){
	foreach ($model->ReportedeCorteCajas($_POST['SucursalBs'],$_POST['FechaInicios'],$_POST['Turnoss']) as $r) 
	{

    $pdf->SetFont('Arial','B',15);
	$pdf->Cell(30);
	$pdf->Cell(120,10,utf8_decode($r->Sucursala),0,0,'C');
	$pdf->Ln(20);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'Nombre del Cajero(a):_______________________________',0,0,'L',0);
	$pdf->Cell(80,6,utf8_decode($r->NombreCompleto),0,0,'C');
	$pdf->Cell(10,6,'Turno :___________________',0,0,'L',0);
	$pdf->Cell(0,6,utf8_decode($r->Turnos),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(16,6,'Hora Entrada:_____________',0,0,'L',0);
	$pdf->Cell(47,6,utf8_decode($r->HoraEntro),0,0,'C');
	$pdf->Cell(15,6,'Hora Salida:_____________',0,0,'L',0);
	$pdf->Cell(43,6,utf8_decode($r->Hora),0,0,'C');
	$pdf->Cell(15,6,'Fecha:___________________',0,0,'L',0);
	$pdf->Cell(0,6,utf8_decode($r->FechaEntro),0,0,'C');
    $pdf->Ln(10);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,6,'BILLETES',0,0,'C',0);
	$pdf->Ln(10);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'De 200.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete200),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete200 * 200),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De 100.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete100),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete100 * 100),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   50.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete50),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete50 * 50),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   20.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete20),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete20 * 20),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   10.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete10),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete10 * 10),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     5.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete5),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete5 * 5),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     1.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete1),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete1),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'    SUMA TOTAL DE BILLETES                                          Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaBilletes),0,0,'C');
    $pdf->Ln(20);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,6,'MONEDAS',0,0,'C',0);
	$pdf->Ln(10);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'De     1.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda1),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda1),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     0.50:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda50),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda50 * 0.50),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     0.25:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda25),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda25 * 0.25),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'    SUMA TOTAL DE MONEDAS                                          Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaMonedas),0,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6,'SUMA TOTAL DE EFECTIVO.............................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaMonedas + $r->TotalSumaBilletes),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'SUMA TOTAL VALES.........................................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSalidas),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'TOTAL DE INGRESOS........................................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Total),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(45,6,'TOTAL DE VENTA :Q. ',0,0,'L',1);
	$pdf->Cell(20,6,utf8_decode($r->TotalVenta),0,0,'C',1);
	$pdf->Ln(9);
    $pdf->Ln(20);

    $Faltante = ($r->TotalVenta - ($r->TotalSumaMonedas + $r->TotalSumaBilletes + $r->TotalSalidas));
    $Sobrante = (($r->TotalSumaMonedas + $r->TotalSumaBilletes + $r->TotalSalidas) - $r->TotalVenta);
    if($Faltante > 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode($Faltante),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode(0),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }else if($Sobrante > 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode(0),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode($Sobrante),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }else if($Faltante == 0 && $Sobrante == 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode($Faltante),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode($Sobrante),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }
    
	}
	}else if($_POST['SucursalBs'] == '1'){
	foreach ($model->ReportedeCorteCajass($_POST['SucursalBs'],$_POST['FechaInicios'],$_POST['Turnoss']) as $r) 
	{

    $pdf->SetFont('Arial','B',15);
	$pdf->Cell(30);
	$pdf->Cell(120,10,utf8_decode($r->Sucursala),0,0,'C');
	$pdf->Ln(20);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'Nombre del Cajero(a):_______________________________',0,0,'L',0);
	$pdf->Cell(80,6,utf8_decode($r->NombreCompleto),0,0,'C');
	$pdf->Cell(10,6,'Turno :___________________',0,0,'L',0);
	$pdf->Cell(0,6,utf8_decode($r->Turnos),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(16,6,'Hora Entrada:_____________',0,0,'L',0);
	$pdf->Cell(47,6,utf8_decode($r->HoraEntro),0,0,'C');
	$pdf->Cell(15,6,'Hora Salida:_____________',0,0,'L',0);
	$pdf->Cell(43,6,utf8_decode($r->Hora),0,0,'C');
	$pdf->Cell(15,6,'Fecha:___________________',0,0,'L',0);
	$pdf->Cell(0,6,utf8_decode($r->FechaEntro),0,0,'C');
    $pdf->Ln(10);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,6,'BILLETES',0,0,'C',0);
	$pdf->Ln(10);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'De 200.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete200),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete200 * 200),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De 100.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete100),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete100 * 100),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   50.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete50),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete50 * 50),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   20.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete20),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete20 * 20),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De   10.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete10),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete10 * 10),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     5.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete5),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete5 * 5),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     1.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Billete1),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Billete1),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'    SUMA TOTAL DE BILLETES                                          Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaBilletes),0,0,'C');
    $pdf->Ln(20);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,6,'MONEDAS',0,0,'C',0);
	$pdf->Ln(10);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'De     1.00:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda1),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda1),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     0.50:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda50),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda50 * 0.50),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(35,6,'De     0.25:______________ = Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Moneda25),0,0,'C');
	$pdf->Cell(80,6,utf8_decode($r->Moneda25 * 0.25),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'    SUMA TOTAL DE MONEDAS                                          Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaMonedas),0,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6,'SUMA TOTAL DE EFECTIVO.............................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSumaMonedas + $r->TotalSumaBilletes),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'SUMA TOTAL VALES.........................................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->TotalSalidas),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(130,6,'TOTAL DE INGRESOS........................................................Q. ___________________',0,0,'L',0);
	$pdf->Cell(10,6,utf8_decode($r->Total),0,0,'C');
	$pdf->Ln(9);
	$pdf->Cell(45,6,'TOTAL DE VENTA :Q. ',0,0,'L',1);
	$pdf->Cell(20,6,utf8_decode($r->TotalVenta),0,0,'C',1);
	$pdf->Ln(9);
    $pdf->Ln(20);

    $Faltante = ($r->TotalVenta - ($r->TotalSumaMonedas + $r->TotalSumaBilletes + $r->TotalSalidas));
    $Sobrante = (($r->TotalSumaMonedas + $r->TotalSumaBilletes + $r->TotalSalidas) - $r->TotalVenta);
    if($Faltante > 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode($Faltante),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode(0),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }else if($Sobrante > 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode(0),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode($Sobrante),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }else if($Faltante == 0 && $Sobrante == 0){
        $pdf->SetFillColor(232,232,232);
	    $pdf->SetFont('Arial','B',12);
	    $pdf->Cell(20,6,'FALTANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(60,6,utf8_decode($Faltante),0,0,'C');
	    $pdf->Cell(40,6,'SOBRANTE: Q ___________________',0,0,'L',0);
	    $pdf->Cell(10,6,utf8_decode($Sobrante),0,0,'C');
	    $pdf->Ln(9);
        $pdf->Ln(20);
        }
    
	}
	}
	
	$pdf->Output();
?>