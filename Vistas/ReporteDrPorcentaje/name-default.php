<?
	/** Error reporting */
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');
	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');


	//CARGAR LA CLASE PHP EXCEL

	require 'Classes/PHPExcel.php';

	//MODELO QUE TRAERA LA CONSULTA

	$model = new  Existencias();

	//FILA DONDE INICIAREMOS

	$Fila = 4;
	$Fila1 = 8;
	$Fila2 = 14;
	$Fila3 = 20;
	$Fila4 = 26;
	$Fila6 = 41;
	$Fila7 = 47;
	$Fila8 = 54;
    $Fila9 = 59;
    $Fila10 =63;
    $Fila11= 70;
    $Fila12= 75;
    $Fila13= 80;
    $Fila14= 87;
    $Fila15= 91;
    $Fila16= 96;
    $Fila17= 102;
    $Fila18= 111;
    $Fila19= 126;
    $Fila20= 142;
    $Fila21= 148;
    $Fila22= 159;
    $Fila23= 172;
    $Fila24= 178;
    $Fila25= 188;
    $Fila26= 194;
    $Fila27= 199;
    $Fila28= 203;
    $Fila29= 206;
   // $Fila30= 210;
    $Fila31= 210;
    $Fila32= 215;
    $Fila33= 223;
    $Fila34= 228;
    $Fila35= 234;
    $Fila36= 238;
    $Fila37= 242;
    $Fila38= 245;
    $Fila39= 249;
    $Fila40= 259;
    $Fila41= 266;
    $Fila42= 272;
    $Fila43= 277;
    $Fila44= 281;
    $Fila45= 298;
    $Fila46= 307;
    $Fila47= 315;
    $Fila48= 319;
    $Fila49= 326;
    $Fila50= 332;
    $Fila51= 337;
    $Fila52= 343;
    $Fila53= 349;
    $Fila54= 357;
    $Fila55= 364;
    $Fila56= 367;
    $Fila57= 372;
    $Fila58= 378;
    $Fila59= 382;
    $Fila60= 389;
    $Fila61= 397;
    $Fila62= 400;
    $Fila63= 405;
    $Fila64= 411;
    $Fila65= 418;
    $Fila66= 421;
    $Fila67= 431;
    $Fila68= 438;
    $Fila69= 445;
    $Fila70= 452;
    $Fila71= 463;
    $Fila72= 468;
    $Fila73= 472;
    $Fila74= 478;
    $Fila75= 484;
    $Fila76= 490;
    $Fila77= 496;
    $Fila78= 502;
    $Fila79= 506;
    $Fila80= 510;
    $Fila81= 513;
    $Fila82= 517;
    $Fila83= 529;
    $Fila84= 533;
    $Fila85= 538;
    $Fila86= 543;
    $Fila87= 546;
    $Fila88= 550;
    $Fila89= 556;
    $Fila90= 564;
    $Fila91= 568;
    $Fila92= 575;
    $Fila93= 579;
    $Fila94= 614;
    $Fila95= 620;
    $Fila96= 625;
    $Fila97= 631;
    $Fila98= 637;
    $Fila99= 650;
    $Fila100= 657;
    $Fila101= 663;
    $Fila102= 669;
    $Fila103= 673;
    $Fila104= 678;
    $Fila105= 682;
    $Fila106= 687;
    $Fila107= 698;
    $Fila108= 703;
    $Fila109= 708;
    $Fila110= 719;
    $Fila111= 729;
    $Fila112= 735;
    $Fila113= 739;
    $Fila114= 742;
    $Fila115= 746;
    $Fila116= 757;
    $Fila118= 761;
    $Fila119= 768;
    $Fila120= 794;
	$ControlLinea = 3;
	$ControlLinea1 = 7;
	$ControlLinea2 = 13;
	//INSTANCIA DE PHP EXCEL

	$objPHPExcel = new PHPExcel();

	//HOJA DONDE INICIAMOS

	$objPHPExcel->setActiveSheetIndex(0);

	//TITULO DE HOJA

	$objPHPExcel->getActiveSheet()->setTitle("Empleados");

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
  
  	$objPHPExcel->getActiveSheet()->setCellValue('A1','QUIEN REALIZO EXISTENCIA: SISTEMAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B1','DIA:');
	$objPHPExcel->getActiveSheet()->setCellValue('C1','FECHA:');

   $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
   PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
    $boldArrayY = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
   PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
   $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->applyFromArray($boldArrayY);
   $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->applyFromArray($boldArray);
   $objPHPExcel->getActiveSheet()->getStyle('A3:O3')->applyFromArray($boldArrayY);
   $objPHPExcel->getActiveSheet()->getStyle('A7:O7')->applyFromArray($boldArrayY);
   $objPHPExcel->getActiveSheet()->getStyle('A13:O13')->applyFromArray($boldArrayY);

	//ENCAVEZADOS

	$objPHPExcel->getActiveSheet()->setCellValue('A2','DICLOFENACOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B2','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C2','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D2','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E2','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F2','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ControlLinea,'TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ControlLinea1,'GOTAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ControlLinea2,'SUSPENSION');
	
	$objPHPExcel->getActiveSheet()->getStyle('A18:O18')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A19:O19')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A25:O25')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A18','DEXKETOPROFENO');
	$objPHPExcel->getActiveSheet()->setCellValue('B18','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C18','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D18','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E18','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F18','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A19','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A25','TABLETAS');


	//RECORRER LA CONSULTA Y CARGARLA A EXCEL

	foreach ($model->ReporteDRporcentaje('1') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->PorcentajeAplicado));
		$Fila++;
	}
	
	foreach ($model->ReporteDRporcentaje('2') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila1, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila1, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila1, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila1, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila1, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila1, ($r->PorcentajeAplicado));
		$Fila1++;
	}
	
	foreach ($model->ReporteDRporcentaje('3') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila2, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila2, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila2, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila2, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila2, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila2, ($r->PorcentajeAplicado));
		$Fila2++;
	}
	
	foreach ($model->ReporteDRporcentaje('4') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila3, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila3, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila3, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila3, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila3, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila3, ($r->PorcentajeAplicado));
		$Fila3++;
	}
	
	foreach ($model->ReporteDRporcentaje('5') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila4, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila4, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila4, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila4, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila4, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila4, ($r->PorcentajeAplicado));
		$Fila4++;
	}
	
	
	$objPHPExcel->getActiveSheet()->getStyle('A39:O39')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A40:O40')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A46:O46')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A39','KETOROLACO');
	$objPHPExcel->getActiveSheet()->setCellValue('B39','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C39','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D39','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E39','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F39','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A40','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A46','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('6') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila6, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila6, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila6, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila6, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila6, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila6, ($r->PorcentajeAplicado));
		$Fila6++;
	}
	
		foreach ($model->ReporteDRporcentaje('7') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila7, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila7, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila7, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila7, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila7, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila7, ($r->PorcentajeAplicado));
		$Fila7++;
	}
	
		
	$objPHPExcel->getActiveSheet()->getStyle('A52:O52')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A53:O53')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A52','TRAMADOL + PARACETAMOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B52','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C52','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D52','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E52','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F52','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A53','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('8') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila8, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila8, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila8, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila8, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila8, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila8, ($r->PorcentajeAplicado));
		$Fila8++;
	}
	
			
	$objPHPExcel->getActiveSheet()->getStyle('A57:O57')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A58:O58')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A57','MELOXICAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B57','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C57','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D57','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E57','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F57','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A58','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('9') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila9, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila9, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila9, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila9, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila9, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila9, ($r->PorcentajeAplicado));
		$Fila9++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A61:O61')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A62:O62')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A61','CELECOXIB');
	$objPHPExcel->getActiveSheet()->setCellValue('B61','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C61','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D61','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E61','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F61','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A62','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('10') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila10, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila10, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila10, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila10, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila10, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila10, ($r->PorcentajeAplicado));
		$Fila10++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A68:O68')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A69:O69')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A68','ETORICOXIB');
	$objPHPExcel->getActiveSheet()->setCellValue('B68','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C68','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D68','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E68','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F68','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A69','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('11') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila11, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila11, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila11, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila11, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila11, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila11, ($r->PorcentajeAplicado));
		$Fila11++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A73:O73')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A74:O74')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A73','PARACETAMOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B73','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C73','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D73','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E73','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F73','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A74','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('12') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila12, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila12, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila12, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila12, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila12, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila12, ($r->PorcentajeAplicado));
		$Fila12++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A78:O78')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A79:O79')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A78','RELAJANTES MUSCULARES');
	$objPHPExcel->getActiveSheet()->setCellValue('B78','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C78','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D78','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E78','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F78','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A79','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('13') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila13, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila13, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila13, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila13, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila13, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila13, ($r->PorcentajeAplicado));
		$Fila13++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A85:O85')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A86:O86')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A90:O90')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A95:O95')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A85','ANTIESPASMÓDICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B85','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C85','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D85','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E85','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F85','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A86','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A90','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A95','GOTAS');
	
	foreach ($model->ReporteDRporcentaje('14') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila14, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila14, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila14, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila14, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila14, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila14, ($r->PorcentajeAplicado));
		$Fila14++;
	}
	
	foreach ($model->ReporteDRporcentaje('15') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila15, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila15, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila15, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila15, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila15, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila15, ($r->PorcentajeAplicado));
		$Fila15++;
	}
	
	foreach ($model->ReporteDRporcentaje('16') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila16, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila16, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila16, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila16, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila16, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila16, ($r->PorcentajeAplicado));
		$Fila16++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A100:O100')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A101:O101')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A110:O110')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A125:O125')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A141:O141')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A100','VITAMINAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B100','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C100','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D100','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E100','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F100','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A101','AMPOLLAS NEUROTROPAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A110','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A125','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A141','AMPOLLAS BEBIBLES');
	
	foreach ($model->ReporteDRporcentaje('17') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila17, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila17, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila17, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila17, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila17, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila17, ($r->PorcentajeAplicado));
		$Fila17++;
	}
	
	foreach ($model->ReporteDRporcentaje('18') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila18, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila18, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila18, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila18, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila18, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila18, ($r->PorcentajeAplicado));
		$Fila18++;
	}
	
	foreach ($model->ReporteDRporcentaje('19') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila19, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila19, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila19, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila19, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila19, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila19, ($r->PorcentajeAplicado));
		$Fila19++;
	}
	
	foreach ($model->ReporteDRporcentaje('20') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila20, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila20, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila20, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila20, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila20, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila20, ($r->PorcentajeAplicado));
		$Fila20++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A146:O146')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A147:O147')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A146','VITAMINAS PRENATALES');
	$objPHPExcel->getActiveSheet()->setCellValue('B146','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C146','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D146','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E146','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F146','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A147','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('21') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila21, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila21, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila21, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila21, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila21, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila21, ($r->PorcentajeAplicado));
		$Fila21++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A157:O157')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A158:O158')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A157','GERIÁTRICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B157','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C157','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D157','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E157','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F157','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A158','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('22') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila22, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila22, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila22, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila22, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila22, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila22, ($r->PorcentajeAplicado));
		$Fila22++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A169:O169')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A170:O170')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A171:O171')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A177:O177')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A169','ANTIBIÓTICOS');
   	$objPHPExcel->getActiveSheet()->setCellValue('A170','AMOXICILINA + ÁCIDO CLAVULÁNICO');
	$objPHPExcel->getActiveSheet()->setCellValue('B170','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C170','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D170','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E170','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F170','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A171','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A177','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('23') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila23, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila23, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila23, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila23, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila23, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila23, ($r->PorcentajeAplicado));
		$Fila23++;
	}
	
	foreach ($model->ReporteDRporcentaje('24') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila24, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila24, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila24, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila24, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila24, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila24, ($r->PorcentajeAplicado));
		$Fila24++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A186:O186')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A187:O187')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A193:O193')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A186','AMOXICILINA + SULBACTAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B186','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C186','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D186','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E186','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F186','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A187','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A193','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('25') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila25, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila25, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila25, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila25, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila25, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila25, ($r->PorcentajeAplicado));
		$Fila25++;
	}
	
	foreach ($model->ReporteDRporcentaje('26') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila26, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila26, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila26, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila26, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila26, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila26, ($r->PorcentajeAplicado));
		$Fila26++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A197:O197')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A198:O198')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A197','DOXICILINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B197','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C197','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D197','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E197','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F197','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A198','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('27') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila27, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila27, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila27, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila27, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila27, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila27, ($r->PorcentajeAplicado));
		$Fila27++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A201:O201')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A202:O202')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A205:O205')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A201','AMPICILINA + SULBACTAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B201','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C201','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D201','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E201','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F201','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A202','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A205','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('28') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila28, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila28, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila28, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila28, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila28, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila28, ($r->PorcentajeAplicado));
		$Fila28++;
	}
	
	foreach ($model->ReporteDRporcentaje('29') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila29, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila29, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila29, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila29, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila29, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila29, ($r->PorcentajeAplicado));
		$Fila29++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A208:O208')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A209:O209')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A208','OFLOXACINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B208','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C208','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D208','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E208','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F208','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A209','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('31') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila31, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila31, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila31, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila31, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila31, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila31, ($r->PorcentajeAplicado));
		$Fila31++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A213:O213')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A214:O214')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A213','CIPROFLOXACINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B213','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C213','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D213','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E213','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F213','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A214','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('32') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila32, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila32, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila32, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila32, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila32, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila32, ($r->PorcentajeAplicado));
		$Fila32++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A221:O221')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A222:O222')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A221','NORFLOXACINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B221','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C221','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D221','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E221','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F221','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A222','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('33') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila33, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila33, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila33, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila33, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila33, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila33, ($r->PorcentajeAplicado));
		$Fila33++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A226:O226')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A227:O227')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A233:O233')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A226','AZITROMICINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B226','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C226','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D226','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E226','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F226','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A227','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A233','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('34') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila34, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila34, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila34, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila34, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila34, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila34, ($r->PorcentajeAplicado));
		$Fila34++;
	}
	
	foreach ($model->ReporteDRporcentaje('35') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila35, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila35, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila35, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila35, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila35, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila35, ($r->PorcentajeAplicado));
		$Fila35++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A236:O236')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A237:O237')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A236','TRIMETROPRIM');
	$objPHPExcel->getActiveSheet()->setCellValue('B236','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C236','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D236','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E236','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F236','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A237','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('36') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila36, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila36, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila36, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila36, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila36, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila36, ($r->PorcentajeAplicado));
		$Fila36++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A240:O240')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A241:O241')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A244:O244')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A240','CEFDINIR');
	$objPHPExcel->getActiveSheet()->setCellValue('B240','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C240','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D240','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E240','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F240','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A241','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A244','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('37') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila37, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila37, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila37, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila37, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila37, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila37, ($r->PorcentajeAplicado));
		$Fila37++;
	}
	
	foreach ($model->ReporteDRporcentaje('38') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila38, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila38, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila38, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila38, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila38, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila38, ($r->PorcentajeAplicado));
		$Fila38++;
	}

    $objPHPExcel->getActiveSheet()->getStyle('A247:O247')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A248:O248')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A258:O258')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A247','CEFIXIMA');
	$objPHPExcel->getActiveSheet()->setCellValue('B247','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C247','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D247','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E247','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F247','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A248','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A258','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('39') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila39, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila39, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila39, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila39, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila39, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila39, ($r->PorcentajeAplicado));
		$Fila39++;
	}
	
	foreach ($model->ReporteDRporcentaje('40') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila40, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila40, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila40, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila40, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila40, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila40, ($r->PorcentajeAplicado));
		$Fila40++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A264:O264')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A265:O265')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A264','CLINDAMICINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B264','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C264','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D264','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E264','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F264','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A265','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('41') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila41, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila41, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila41, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila41, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila41, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila41, ($r->PorcentajeAplicado));
		$Fila41++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A270:O270')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A271:O271')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A276:O276')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A270','CLARITROMICINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B270','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C270','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D270','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E270','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F270','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A271','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A276','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('42') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila42, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila42, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila42, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila42, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila42, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila42, ($r->PorcentajeAplicado));
		$Fila42++;
	}
	
	foreach ($model->ReporteDRporcentaje('43') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila43, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila43, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila43, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila43, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila43, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila43, ($r->PorcentajeAplicado));
		$Fila43++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A279:O279')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A280:O280')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A279','CEFTRIAXONA');
	$objPHPExcel->getActiveSheet()->setCellValue('B279','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C279','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D279','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E279','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F279','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A280','AMPOLLAS');
	
	foreach ($model->ReporteDRporcentaje('45') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila44, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila44, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila44, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila44, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila44, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila44, ($r->PorcentajeAplicado));
		$Fila44++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A295:O295')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A296:O296')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A297:O297')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A295','CARDIOMETABÓLICO');
   	$objPHPExcel->getActiveSheet()->setCellValue('A296','ROSUVASTATINA - ATORVASTATINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B296','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C296','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D296','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E296','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F296','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A297','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('46') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila45, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila45, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila45, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila45, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila45, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila45, ($r->PorcentajeAplicado));
		$Fila45++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A304:O304')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A305:O305')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A306:O306')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A314:O314')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A304','GASTROINTESTINALES');
   	$objPHPExcel->getActiveSheet()->setCellValue('A305','ESOMEPRAZOL 40MG');
	$objPHPExcel->getActiveSheet()->setCellValue('B305','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C305','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D305','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E305','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F305','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A306','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A314','SOBRES');
	
	foreach ($model->ReporteDRporcentaje('47') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila46, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila46, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila46, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila46, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila46, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila46, ($r->PorcentajeAplicado));
		$Fila46++;
	}
	
	foreach ($model->ReporteDRporcentaje('48') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila47, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila47, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila47, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila47, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila47, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila47, ($r->PorcentajeAplicado));
		$Fila47++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A318:O318')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A318','NUEVOS GASTROINTESTINALES');
	$objPHPExcel->getActiveSheet()->setCellValue('B318','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C318','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D318','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E318','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F318','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('49') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila48, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila48, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila48, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila48, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila48, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila48, ($r->PorcentajeAplicado));
		$Fila48++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A324:O324')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A325:O325')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A331:O331')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A324','LANSOPRAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B324','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C324','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D324','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E324','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F324','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A325','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A331','SOBRES');
	
	foreach ($model->ReporteDRporcentaje('50') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila49, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila49, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila49, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila49, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila49, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila49, ($r->PorcentajeAplicado));
		$Fila49++;
	}
	
	foreach ($model->ReporteDRporcentaje('51') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila50, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila50, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila50, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila50, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila50, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila50, ($r->PorcentajeAplicado));
		$Fila50++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A335:O335')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A336:O336')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A335','PANTOPRAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B335','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C335','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D335','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E335','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F335','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A336','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('52') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila51, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila51, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila51, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila51, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila51, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila51, ($r->PorcentajeAplicado));
		$Fila51++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A341:O341')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A342:O342')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A341','HELICOBACTER PYLORI');
	$objPHPExcel->getActiveSheet()->setCellValue('B341','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C341','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D341','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E341','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F341','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A342','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('53') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila52, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila52, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila52, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila52, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila52, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila52, ($r->PorcentajeAplicado));
		$Fila52++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A347:O347')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A348:O348')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A347','SUCRALFATO');
	$objPHPExcel->getActiveSheet()->setCellValue('B347','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C347','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D347','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E347','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F347','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A348','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('54') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila53, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila53, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila53, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila53, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila53, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila53, ($r->PorcentajeAplicado));
		$Fila53++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A355:O355')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A356:O356')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A355','ANTIÁCIDOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B355','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C355','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D355','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E355','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F355','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A356','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('55') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila54, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila54, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila54, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila54, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila54, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila54, ($r->PorcentajeAplicado));
		$Fila54++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A362:O362')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A363:O363')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A366:O366')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A362','MOSAPRIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B362','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C362','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D362','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E362','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F362','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A363','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A366','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('56') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila55, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila55, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila55, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila55, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila55, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila55, ($r->PorcentajeAplicado));
		$Fila55++;
	}
	
	foreach ($model->ReporteDRporcentaje('57') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila56, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila56, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila56, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila56, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila56, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila56, ($r->PorcentajeAplicado));
		$Fila56++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A370:O370')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A371:O371')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A370','BROMURO DE OTILONIO');
	$objPHPExcel->getActiveSheet()->setCellValue('B370','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C370','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D370','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E370','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F370','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A371','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('58') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila57, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila57, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila57, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila57, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila57, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila57, ($r->PorcentajeAplicado));
		$Fila57++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A376:O376')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A377:O377')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A376','CLIDINIO + CLORDEAZEPOXIDO');
	$objPHPExcel->getActiveSheet()->setCellValue('B376','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C376','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D376','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E376','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F376','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A377','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('59') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila58, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila58, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila58, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila58, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila58, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila58, ($r->PorcentajeAplicado));
		$Fila58++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A380:O380')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A381:O381')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A388:O388')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A380','SECNIDAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B380','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C380','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D380','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E380','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F380','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A381','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A388','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('60') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila59, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila59, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila59, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila59, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila59, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila59, ($r->PorcentajeAplicado));
		$Fila59++;
	}
	
	foreach ($model->ReporteDRporcentaje('61') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila60, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila60, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila60, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila60, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila60, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila60, ($r->PorcentajeAplicado));
		$Fila60++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A395:O395')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A396:O396')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A399:O399')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A395','ALBENDAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B395','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C395','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D395','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E395','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F395','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A396','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A399','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('62') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila61, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila61, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila61, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila61, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila61, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila61, ($r->PorcentajeAplicado));
		$Fila61++;
	}
	
	foreach ($model->ReporteDRporcentaje('63') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila62, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila62, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila62, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila62, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila62, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila62, ($r->PorcentajeAplicado));
		$Fila62++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A403:O403')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A404:O404')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A403','PAMOATO DE PIRANTEL');
	$objPHPExcel->getActiveSheet()->setCellValue('B403','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C403','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D403','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E403','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F403','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A404','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('64') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila63, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila63, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila63, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila63, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila63, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila63, ($r->PorcentajeAplicado));
		$Fila63++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A409:O409')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A410:O410')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A417:O417')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A409','METRONIDAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B409','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C409','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D409','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E409','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F409','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A410','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A417','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('65') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila64, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila64, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila64, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila64, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila64, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila64, ($r->PorcentajeAplicado));
		$Fila64++;
	}
	
	foreach ($model->ReporteDRporcentaje('125') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila65, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila65, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila65, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila65, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila65, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila65, ($r->PorcentajeAplicado));
		$Fila65++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A419:O419')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A420:O420')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A430:O430')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A437:O437')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A419','NITAZOXANIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B419','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C419','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D419','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E419','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F419','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A420','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A430','SUSPENSIÓN 30ML');
	$objPHPExcel->getActiveSheet()->setCellValue('A437','SUSPENSIÓN 60ML');
	
	foreach ($model->ReporteDRporcentaje('66') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila66, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila66, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila66, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila66, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila66, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila66, ($r->PorcentajeAplicado));
		$Fila66++;
	}
	
	foreach ($model->ReporteDRporcentaje('67') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila67, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila67, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila67, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila67, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila67, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila67, ($r->PorcentajeAplicado));
		$Fila67++;
	}
	
	foreach ($model->ReporteDRporcentaje('68') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila68, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila68, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila68, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila68, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila68, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila68, ($r->PorcentajeAplicado));
		$Fila68++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A443:O443')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A444:O444')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A443','METFORMINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B443','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C443','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D443','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E443','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F443','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A444','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('69') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila69, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila69, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila69, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila69, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila69, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila69, ($r->PorcentajeAplicado));
		$Fila69++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A450:O450')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A451:O451')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A450','METFORMINA + GLIMEPIRIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B450','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C450','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D450','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E450','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F450','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A451','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('70') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila70, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila70, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila70, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila70, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila70, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila70, ($r->PorcentajeAplicado));
		$Fila70++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A461:O461')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A462:O462')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A461','METFORMINA + GLIBENCLAMIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B461','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C461','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D461','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E461','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F461','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A462','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('71') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila71, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila71, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila71, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila71, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila71, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila71, ($r->PorcentajeAplicado));
		$Fila71++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A466:O466')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A467:O467')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A466','GLIMEPIRIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B466','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C466','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D466','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E466','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F466','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A467','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('72') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila72, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila72, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila72, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila72, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila72, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila72, ($r->PorcentajeAplicado));
		$Fila72++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A470:O470')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A471:O471')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A477:O477')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A483:O483')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A470','PREGABALINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B470','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C470','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D470','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E470','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F470','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A471','TABLETAS 75 MG');
	$objPHPExcel->getActiveSheet()->setCellValue('A477','TABLETAS 150 MG');
	$objPHPExcel->getActiveSheet()->setCellValue('A483','TABLETAS 300 MG');
	
	foreach ($model->ReporteDRporcentaje('73') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila73, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila73, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila73, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila73, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila73, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila73, ($r->PorcentajeAplicado));
		$Fila73++;
	}
	
	foreach ($model->ReporteDRporcentaje('74') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila74, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila74, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila74, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila74, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila74, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila74, ($r->PorcentajeAplicado));
		$Fila74++;
	}
	
	foreach ($model->ReporteDRporcentaje('75') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila75, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila75, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila75, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila75, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila75, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila75, ($r->PorcentajeAplicado));
		$Fila75++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A488:O488')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A489:O489')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A488','GABAPENTINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B488','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C488','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D488','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E488','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F488','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A489','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('76') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila76, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila76, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila76, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila76, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila76, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila76, ($r->PorcentajeAplicado));
		$Fila76++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A494:O494')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A495:O495')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A494','FLUNARIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B494','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C494','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D494','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E494','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F494','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A495','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('77') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila77, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila77, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila77, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila77, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila77, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila77, ($r->PorcentajeAplicado));
		$Fila77++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A500:O500')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A501:O501')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A500','CINARIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B500','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C500','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D500','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E500','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F500','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A501','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('78') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila78, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila78, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila78, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila78, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila78, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila78, ($r->PorcentajeAplicado));
		$Fila78++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A504:O504')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A505:O505')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A509:O509')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A512:O512')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A504','GINGKO BILOBA');
	$objPHPExcel->getActiveSheet()->setCellValue('B504','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C504','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D504','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E504','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F504','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A505','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A509','GOTAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A512','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('79') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila79, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila79, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila79, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila79, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila79, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila79, ($r->PorcentajeAplicado));
		$Fila79++;
	}
	
	foreach ($model->ReporteDRporcentaje('80') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila80, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila80, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila80, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila80, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila80, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila80, ($r->PorcentajeAplicado));
		$Fila80++;
	}
	
	foreach ($model->ReporteDRporcentaje('81') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila81, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila81, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila81, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila81, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila81, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila81, ($r->PorcentajeAplicado));
		$Fila81++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A515:O515')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A516:O516')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A528:O528')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A515','ESTEROIDES');
	$objPHPExcel->getActiveSheet()->setCellValue('B515','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C515','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D515','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E515','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F515','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A516','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A528','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('82') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila82, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila82, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila82, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila82, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila82, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila82, ($r->PorcentajeAplicado));
		$Fila82++;
	}
	foreach ($model->ReporteDRporcentaje('83') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila83, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila83, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila83, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila83, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila83, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila83, ($r->PorcentajeAplicado));
		$Fila83++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A531:O531')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A532:O532')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A531','PREDNISOLONA');
	$objPHPExcel->getActiveSheet()->setCellValue('B531','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C531','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D531','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E531','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F531','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A532','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('85') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila84, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila84, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila84, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila84, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila84, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila84, ($r->PorcentajeAplicado));
		$Fila84++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A536:O536')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A537:O537')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A536','ANTIHISTAMINICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B536','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C536','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D536','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E536','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F536','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A537','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('86') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila85, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila85, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila85, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila85, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila85, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila85, ($r->PorcentajeAplicado));
		$Fila85++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A541:O541')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A542:O542')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A545:O545')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A541','RUPATADINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B541','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C541','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D541','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E541','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F541','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A542','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A545','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('87') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila86, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila86, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila86, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila86, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila86, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila86, ($r->PorcentajeAplicado));
		$Fila86++;
	}
	
	foreach ($model->ReporteDRporcentaje('88') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila87, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila87, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila87, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila87, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila87, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila87, ($r->PorcentajeAplicado));
		$Fila87++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A548:O548')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A549:O549')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A555:O555')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A548','DESLORATADINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B548','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C548','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D548','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E548','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F548','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A549','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A555','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('89') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila88, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila88, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila88, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila88, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila88, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila88, ($r->PorcentajeAplicado));
		$Fila88++;
	}
	
	foreach ($model->ReporteDRporcentaje('90') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila89, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila89, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila89, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila89, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila89, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila89, ($r->PorcentajeAplicado));
		$Fila89++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A562:O562')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A563:O563')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A567:O567')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A562','CETIRIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B562','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C562','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D562','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E562','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F562','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A563','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A567','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('91') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila90, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila90, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila90, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila90, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila90, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila90, ($r->PorcentajeAplicado));
		$Fila90++;
	}
	
	foreach ($model->ReporteDRporcentaje('92') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila91, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila91, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila91, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila91, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila91, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila91, ($r->PorcentajeAplicado));
		$Fila91++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A573:O573')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A574:O574')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A573','LEVOCETIRIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B573','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C573','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D573','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E573','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F573','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A574','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('93') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila92, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila92, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila92, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila92, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila92, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila92, ($r->PorcentajeAplicado));
		$Fila92++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A577:O577')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A578:O578')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A577','ANTITUSIVO');
	$objPHPExcel->getActiveSheet()->setCellValue('B577','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C577','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D577','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E577','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F577','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A578','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('94') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila93, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila93, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila93, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila93, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila93, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila93, ($r->PorcentajeAplicado));
		$Fila93++;
	}
	$objPHPExcel->getActiveSheet()->getStyle('A612:O612')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A613:O613')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A612','AMBROXOL + CLEMBUTEROL');
	$objPHPExcel->getActiveSheet()->setCellValue('B612','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C612','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D612','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E612','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F612','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A613','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('95') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila94, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila94, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila94, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila94, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila94, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila94, ($r->PorcentajeAplicado));
		$Fila94++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A618:O618')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A619:O619')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A618','AMBROXOL + SALBUTAMOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B618','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C618','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D618','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E618','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F618','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A619','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('96') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila95, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila95, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila95, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila95, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila95, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila95, ($r->PorcentajeAplicado));
		$Fila95++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A623:O623')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A624:O624')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A623','AMBROXOL + LORATADINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B623','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C623','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D623','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E623','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F623','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A624','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('97') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila96, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila96, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila96, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila96, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila96, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila96, ($r->PorcentajeAplicado));
		$Fila96++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A629:O629')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A630:O630')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A629','AMBROXOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B629','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C629','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D629','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E629','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F629','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A630','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('98') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila97, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila97, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila97, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila97, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila97, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila97, ($r->PorcentajeAplicado));
		$Fila97++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A635:O635')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A636:O636')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A635','HEDERA HELIX');
	$objPHPExcel->getActiveSheet()->setCellValue('B635','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C635','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D635','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E635','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F635','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A636','SUSPENSIÓN');
	
	foreach ($model->ReporteDRporcentaje('99') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila98, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila98, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila98, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila98, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila98, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila98, ($r->PorcentajeAplicado));
		$Fila98++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A648:O648')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A649:O649')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A648','ANSIOLITICOS ANTIDEPRESIVOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B648','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C648','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D648','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E648','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F648','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A649','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('100') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila99, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila99, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila99, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila99, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila99, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila99, ($r->PorcentajeAplicado));
		$Fila99++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A655:O655')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A656:O656')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A655','ALPRAZOLAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B655','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C655','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D655','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E655','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F655','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A656','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('101') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila100, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila100, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila100, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila100, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila100, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila100, ($r->PorcentajeAplicado));
		$Fila100++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A661:O661')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A662:O662')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A661','BROMAZEPAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B661','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C661','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D661','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E661','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F661','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A662','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('102') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila101, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila101, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila101, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila101, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila101, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila101, ($r->PorcentajeAplicado));
		$Fila101++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A667:O667')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A668:O668')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A667','CITALOPRAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B667','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C667','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D667','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E667','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F667','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A668','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('103') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila102, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila102, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila102, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila102, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila102, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila102, ($r->PorcentajeAplicado));
		$Fila102++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A671:O671')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A672:O672')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A671','ESCITALOPRAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B671','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C671','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D671','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E671','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F671','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A672','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('104') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila103, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila103, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila103, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila103, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila103, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila103, ($r->PorcentajeAplicado));
		$Fila103++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A676:O676')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A677:O677')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A676','SERTRALINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B676','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C676','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D676','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E676','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F676','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A677','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('105') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila104, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila104, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila104, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila104, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila104, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila104, ($r->PorcentajeAplicado));
		$Fila104++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A680:O680')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A681:O681')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A680','ANTIHIPERTENSIVO');
	$objPHPExcel->getActiveSheet()->setCellValue('B680','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C680','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D680','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E680','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F680','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A681','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('106') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila105, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila105, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila105, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila105, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila105, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila105, ($r->PorcentajeAplicado));
		$Fila105++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A685:O685')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A686:O686')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A697:O697')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A702:O702')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A685','SISTEMA NERVIOSO CENTRAL');
	$objPHPExcel->getActiveSheet()->setCellValue('B685','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C685','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D685','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E685','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F685','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A686','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A697','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A702','AMPOLLA');
	
	foreach ($model->ReporteDRporcentaje('107') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila106, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila106, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila106, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila106, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila106, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila106, ($r->PorcentajeAplicado));
		$Fila106++;
	}
	
	foreach ($model->ReporteDRporcentaje('108') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila107, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila107, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila107, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila107, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila107, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila107, ($r->PorcentajeAplicado));
		$Fila107++;
	}
	
	foreach ($model->ReporteDRporcentaje('109') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila108, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila108, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila108, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila108, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila108, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila108, ($r->PorcentajeAplicado));
		$Fila108++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A705:O705')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A706:O706')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A707:O707')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A705','ANTIMICOTICOS');
   	$objPHPExcel->getActiveSheet()->setCellValue('A706','FLUCONAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B706','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C706','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D706','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E706','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F706','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A707','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('110') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila109, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila109, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila109, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila109, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila109, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila109, ($r->PorcentajeAplicado));
		$Fila109++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A717:O717')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A718:O718')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A717','GINECOLÓGICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B717','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C717','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D717','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E717','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F717','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A718','TABLETAS');
	
	foreach ($model->ReporteDRporcentaje('111') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila110, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila110, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila110, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila110, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila110, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila110, ($r->PorcentajeAplicado));
		$Fila110++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A727:O727')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A728:O728')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A727','OFTALMOLÓGICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B727','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C727','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D727','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E727','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F727','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A728','GOTAS');
	
	foreach ($model->ReporteDRporcentaje('112') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila111, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila111, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila111, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila111, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila111, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila111, ($r->PorcentajeAplicado));
		$Fila111++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A733:O733')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A734:O734')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A733','ÓTICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B733','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C733','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D733','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E733','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F733','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A734','GOTAS');
	
	foreach ($model->ReporteDRporcentaje('113') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila112, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila112, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila112, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila112, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila112, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila112, ($r->PorcentajeAplicado));
		$Fila112++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A737:O737')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A738:O738')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A737','GOTAS NASALES');
	$objPHPExcel->getActiveSheet()->setCellValue('B737','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C737','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D737','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E737','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F737','PorcentajeAplicado');
	$objPHPExcel->getActiveSheet()->setCellValue('A738','GOTAS');
	
	foreach ($model->ReporteDRporcentaje('114') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila113, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila113, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila113, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila113, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila113, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila113, ($r->PorcentajeAplicado));
		$Fila113++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A741:O741')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A741','CREMAS COMBINADAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B741','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C741','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D741','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E741','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F741','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('115') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila114, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila114, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila114, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila114, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila114, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila114, ($r->PorcentajeAplicado));
		$Fila114++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A745:O745')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A745','CREMAS VARIAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B745','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C745','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D745','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E745','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F745','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('116') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila115, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila115, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila115, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila115, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila115, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila115, ($r->PorcentajeAplicado));
		$Fila115++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A756:O756')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A756','VARIOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B756','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C756','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D756','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E756','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F756','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('117') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila116, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila116, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila116, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila116, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila116, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila116, ($r->PorcentajeAplicado));
		$Fila116++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A760:O760')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A760','NUEVOS AGREGADOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B760','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C760','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D760','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E760','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F760','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('119') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila118, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila118, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila118, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila118, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila118, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila118, ($r->PorcentajeAplicado));
		$Fila118++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A767:O767')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A767','PRODUCTOS GLOBAL FARMA, SA');
	$objPHPExcel->getActiveSheet()->setCellValue('B767','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C767','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D767','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E767','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F767','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('120') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila119, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila119, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila119, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila119, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila119, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila119, ($r->PorcentajeAplicado));
		$Fila119++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A793:O793')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A793','OTROS MEDICAMENTOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B793','ExistenciaTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('C793','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('D793','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('E793','Diferencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F793','PorcentajeAplicado');
	
	foreach ($model->ReporteDRporcentaje('121') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila120, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila120, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila120, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila120, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila120, ($r->Diferecia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila120, ($r->PorcentajeAplicado));
		$Fila120++;
	}
		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Listado Doctor Porcentaje.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>