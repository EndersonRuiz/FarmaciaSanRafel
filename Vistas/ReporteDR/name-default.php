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
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
  
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
	$objPHPExcel->getActiveSheet()->setCellValue('B2','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C2','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ControlLinea,'TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ControlLinea1,'GOTAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ControlLinea2,'SUSPENSION');
	
	$objPHPExcel->getActiveSheet()->getStyle('A18:O18')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A19:O19')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A25:O25')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A18','DEXKETOPROFENO');
	$objPHPExcel->getActiveSheet()->setCellValue('B18','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C18','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A19','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A25','TABLETAS');


	//RECORRER LA CONSULTA Y CARGARLA A EXCEL

	foreach ($model->ReporteDR('1') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, "");
		$Fila++;
	}
	
	foreach ($model->ReporteDR('2') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila1, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila1, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila1, "");
		$Fila1++;
	}
	
	foreach ($model->ReporteDR('3') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila2, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila2, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila2, "");
		$Fila2++;
	}
	
	foreach ($model->ReporteDR('4') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila3, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila3, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila3, "");
		$Fila3++;
	}
	
	foreach ($model->ReporteDR('5') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila4, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila4, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila4, "");
		$Fila4++;
	}
	
	
	$objPHPExcel->getActiveSheet()->getStyle('A39:O39')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A40:O40')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A46:O46')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A39','KETOROLACO');
	$objPHPExcel->getActiveSheet()->setCellValue('B39','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C39','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A40','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A46','TABLETAS');
	
	foreach ($model->ReporteDR('6') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila6, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila6, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila6, "");
		$Fila6++;
	}
	
		foreach ($model->ReporteDR('7') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila7, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila7, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila7, "");
		$Fila7++;
	}
	
		
	$objPHPExcel->getActiveSheet()->getStyle('A52:O52')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A53:O53')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A52','TRAMADOL + PARACETAMOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B52','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C52','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A53','TABLETAS');
	
	foreach ($model->ReporteDR('8') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila8, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila8, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila8, "");
		$Fila8++;
	}
	
			
	$objPHPExcel->getActiveSheet()->getStyle('A57:O57')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A58:O58')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A57','MELOXICAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B57','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C57','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A58','TABLETAS');
	
	foreach ($model->ReporteDR('9') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila9, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila9, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila9, "");
		$Fila9++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A61:O61')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A62:O62')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A61','CELECOXIB');
	$objPHPExcel->getActiveSheet()->setCellValue('B61','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C61','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A62','TABLETAS');
	
	foreach ($model->ReporteDR('10') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila10, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila10, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila10, "");
		$Fila10++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A68:O68')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A69:O69')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A68','ETORICOXIB');
	$objPHPExcel->getActiveSheet()->setCellValue('B68','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C68','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A69','TABLETAS');
	
	foreach ($model->ReporteDR('11') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila11, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila11, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila11, "");
		$Fila11++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A73:O73')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A74:O74')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A73','PARACETAMOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B73','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C73','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A74','TABLETAS');
	
	foreach ($model->ReporteDR('12') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila12, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila12, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila12, "");
		$Fila12++;
	}
	
		$objPHPExcel->getActiveSheet()->getStyle('A78:O78')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A79:O79')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A78','RELAJANTES MUSCULARES');
	$objPHPExcel->getActiveSheet()->setCellValue('B78','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C78','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A79','TABLETAS');
	
	foreach ($model->ReporteDR('13') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila13, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila13, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila13, "");
		$Fila13++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A85:O85')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A86:O86')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A90:O90')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A95:O95')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A85','ANTIESPASMÓDICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B85','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C85','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A86','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A90','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A95','GOTAS');
	
	foreach ($model->ReporteDR('14') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila14, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila14, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila14, "");
		$Fila14++;
	}
	
	foreach ($model->ReporteDR('15') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila15, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila15, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila15, "");
		$Fila15++;
	}
	
	foreach ($model->ReporteDR('16') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila16, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila16, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila16, "");
		$Fila16++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A100:O100')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A101:O101')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A110:O110')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A125:O125')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A141:O141')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A100','VITAMINAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B100','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C100','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A101','AMPOLLAS NEUROTROPAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A110','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A125','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A141','AMPOLLAS BEBIBLES');
	
	foreach ($model->ReporteDR('17') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila17, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila17, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila17, "");
		$Fila17++;
	}
	
	foreach ($model->ReporteDR('18') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila18, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila18, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila18, "");
		$Fila18++;
	}
	
	foreach ($model->ReporteDR('19') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila19, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila19, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila19, "");
		$Fila19++;
	}
	
	foreach ($model->ReporteDR('20') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila20, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila20, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila20, "");
		$Fila20++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A146:O146')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A147:O147')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A146','VITAMINAS PRENATALES');
	$objPHPExcel->getActiveSheet()->setCellValue('B146','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C146','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A147','TABLETAS');
	
	foreach ($model->ReporteDR('21') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila21, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila21, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila21, "");
		$Fila21++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A157:O157')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A158:O158')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A157','GERIÁTRICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B157','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C157','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A158','TABLETAS');
	
	foreach ($model->ReporteDR('22') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila22, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila22, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila22, "");
		$Fila22++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A169:O169')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A170:O170')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A171:O171')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A177:O177')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A169','ANTIBIÓTICOS');
   	$objPHPExcel->getActiveSheet()->setCellValue('A170','AMOXICILINA + ÁCIDO CLAVULÁNICO');
	$objPHPExcel->getActiveSheet()->setCellValue('B170','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C170','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A171','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A177','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('23') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila23, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila23, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila23, "");
		$Fila23++;
	}
	
	foreach ($model->ReporteDR('24') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila24, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila24, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila24, "");
		$Fila24++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A186:O186')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A187:O187')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A193:O193')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A186','AMOXICILINA + SULBACTAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B186','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C186','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A187','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A193','TABLETAS');
	
	foreach ($model->ReporteDR('25') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila25, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila25, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila25, "");
		$Fila25++;
	}
	
	foreach ($model->ReporteDR('26') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila26, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila26, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila26, "");
		$Fila26++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A197:O197')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A198:O198')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A197','DOXICILINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B197','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C197','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A198','TABLETAS');
	
	foreach ($model->ReporteDR('27') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila27, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila27, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila27, "");
		$Fila27++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A201:O201')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A202:O202')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A205:O205')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A201','AMPICILINA + SULBACTAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B201','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C201','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A202','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A205','TABLETAS');
	
	foreach ($model->ReporteDR('28') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila28, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila28, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila28, "");
		$Fila28++;
	}
	
	foreach ($model->ReporteDR('29') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila29, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila29, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila29, "");
		$Fila29++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A208:O208')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A209:O209')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A208','OFLOXACINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B208','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C208','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A209','TABLETAS');
	
	foreach ($model->ReporteDR('31') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila31, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila31, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila31, "");
		$Fila31++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A213:O213')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A214:O214')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A213','CIPROFLOXACINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B213','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C213','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A214','TABLETAS');
	
	foreach ($model->ReporteDR('32') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila32, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila32, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila32, "");
		$Fila32++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A221:O221')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A222:O222')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A221','NORFLOXACINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B221','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C221','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A222','TABLETAS');
	
	foreach ($model->ReporteDR('33') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila33, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila33, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila33, "");
		$Fila33++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A226:O226')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A227:O227')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A233:O233')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A226','AZITROMICINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B226','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C226','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A227','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A233','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('34') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila34, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila34, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila34, "");
		$Fila34++;
	}
	
	foreach ($model->ReporteDR('35') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila35, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila35, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila35, "");
		$Fila35++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A236:O236')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A237:O237')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A236','TRIMETROPRIM');
	$objPHPExcel->getActiveSheet()->setCellValue('B236','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C236','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A237','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('36') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila36, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila36, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila36, "");
		$Fila36++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A240:O240')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A241:O241')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A244:O244')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A240','CEFDINIR');
	$objPHPExcel->getActiveSheet()->setCellValue('B240','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C240','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A241','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A244','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('37') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila37, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila37, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila37, "");
		$Fila37++;
	}
	
	foreach ($model->ReporteDR('38') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila38, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila38, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila38, "");
		$Fila38++;
	}

    $objPHPExcel->getActiveSheet()->getStyle('A247:O247')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A248:O248')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A258:O258')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A247','CEFIXIMA');
	$objPHPExcel->getActiveSheet()->setCellValue('B247','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C247','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A248','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A258','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('39') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila39, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila39, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila39, "");
		$Fila39++;
	}
	
	foreach ($model->ReporteDR('40') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila40, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila40, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila40, "");
		$Fila40++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A264:O264')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A265:O265')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A264','CLINDAMICINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B264','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C264','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A265','TABLETAS');
	
	foreach ($model->ReporteDR('41') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila41, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila41, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila41, "");
		$Fila41++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A270:O270')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A271:O271')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A276:O276')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A270','CLARITROMICINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B270','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C270','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A271','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A276','TABLETAS');
	
	foreach ($model->ReporteDR('42') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila42, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila42, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila42, "");
		$Fila42++;
	}
	
	foreach ($model->ReporteDR('43') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila43, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila43, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila43, "");
		$Fila43++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A279:O279')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A280:O280')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A279','CEFTRIAXONA');
	$objPHPExcel->getActiveSheet()->setCellValue('B279','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C279','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A280','AMPOLLAS');
	
	foreach ($model->ReporteDR('45') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila44, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila44, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila44, "");
		$Fila44++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A295:O295')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A296:O296')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A297:O297')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A295','CARDIOMETABÓLICO');
   	$objPHPExcel->getActiveSheet()->setCellValue('A296','ROSUVASTATINA - ATORVASTATINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B296','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C296','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A297','TABLETAS');
	
	foreach ($model->ReporteDR('46') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila45, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila45, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila45, "");
		$Fila45++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A304:O304')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A305:O305')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A306:O306')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A314:O314')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A304','GASTROINTESTINALES');
   	$objPHPExcel->getActiveSheet()->setCellValue('A305','ESOMEPRAZOL 40MG');
	$objPHPExcel->getActiveSheet()->setCellValue('B305','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C305','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A306','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A314','SOBRES');
	
	foreach ($model->ReporteDR('47') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila46, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila46, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila46, "");
		$Fila46++;
	}
	
	foreach ($model->ReporteDR('48') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila47, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila47, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila47, "");
		$Fila47++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A318:O318')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A318','NUEVOS GASTROINTESTINALES');
	$objPHPExcel->getActiveSheet()->setCellValue('B318','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C318','Notas');
	
	foreach ($model->ReporteDR('49') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila48, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila48, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila48, "");
		$Fila48++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A324:O324')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A325:O325')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A331:O331')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A324','LANSOPRAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B324','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C324','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A325','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A331','SOBRES');
	
	foreach ($model->ReporteDR('50') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila49, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila49, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila49, "");
		$Fila49++;
	}
	
	foreach ($model->ReporteDR('51') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila50, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila50, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila50, "");
		$Fila50++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A335:O335')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A336:O336')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A335','PANTOPRAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B335','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C335','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A336','TABLETAS');
	
	foreach ($model->ReporteDR('52') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila51, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila51, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila51, "");
		$Fila51++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A341:O341')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A342:O342')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A341','HELICOBACTER PYLORI');
	$objPHPExcel->getActiveSheet()->setCellValue('B341','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C341','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A342','TABLETAS');
	
	foreach ($model->ReporteDR('53') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila52, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila52, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila52, "");
		$Fila52++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A347:O347')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A348:O348')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A347','SUCRALFATO');
	$objPHPExcel->getActiveSheet()->setCellValue('B347','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C347','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A348','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('54') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila53, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila53, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila53, "");
		$Fila53++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A355:O355')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A356:O356')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A355','ANTIÁCIDOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B355','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C355','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A356','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('55') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila54, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila54, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila54, "");
		$Fila54++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A362:O362')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A363:O363')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A366:O366')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A362','MOSAPRIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B362','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C362','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A363','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A366','TABLETAS');
	
	foreach ($model->ReporteDR('56') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila55, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila55, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila55, "");
		$Fila55++;
	}
	
	foreach ($model->ReporteDR('57') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila56, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila56, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila56, "");
		$Fila56++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A370:O370')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A371:O371')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A370','BROMURO DE OTILONIO');
	$objPHPExcel->getActiveSheet()->setCellValue('B370','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C370','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A371','TABLETAS');
	
	foreach ($model->ReporteDR('58') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila57, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila57, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila57, "");
		$Fila57++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A376:O376')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A377:O377')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A376','CLIDINIO + CLORDEAZEPOXIDO');
	$objPHPExcel->getActiveSheet()->setCellValue('B376','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C376','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A377','TABLETAS');
	
	foreach ($model->ReporteDR('59') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila58, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila58, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila58, "");
		$Fila58++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A380:O380')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A381:O381')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A388:O388')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A380','SECNIDAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B380','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C380','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A381','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A388','TABLETAS');
	
	foreach ($model->ReporteDR('60') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila59, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila59, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila59, "");
		$Fila59++;
	}
	
	foreach ($model->ReporteDR('61') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila60, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila60, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila60, "");
		$Fila60++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A395:O395')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A396:O396')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A399:O399')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A395','ALBENDAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B395','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C395','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A396','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A399','TABLETAS');
	
	foreach ($model->ReporteDR('62') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila61, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila61, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila61, "");
		$Fila61++;
	}
	
	foreach ($model->ReporteDR('63') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila62, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila62, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila62, "");
		$Fila62++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A403:O403')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A404:O404')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A403','PAMOATO DE PIRANTEL');
	$objPHPExcel->getActiveSheet()->setCellValue('B403','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C403','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A404','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('64') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila63, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila63, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila63, "");
		$Fila63++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A409:O409')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A410:O410')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A417:O417')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A409','METRONIDAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B409','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C409','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A410','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A417','TABLETAS');
	
	foreach ($model->ReporteDR('65') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila64, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila64, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila64, "");
		$Fila64++;
	}
	
	foreach ($model->ReporteDR('125') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila65, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila65, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila65, "");
		$Fila65++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A419:O419')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A420:O420')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A430:O430')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A437:O437')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A419','NITAZOXANIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B419','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C419','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A420','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A430','SUSPENSIÓN 30ML');
	$objPHPExcel->getActiveSheet()->setCellValue('A437','SUSPENSIÓN 60ML');
	
	foreach ($model->ReporteDR('66') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila66, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila66, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila66, "");
		$Fila66++;
	}
	
	foreach ($model->ReporteDR('67') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila67, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila67, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila67, "");
		$Fila67++;
	}
	
	foreach ($model->ReporteDR('68') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila68, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila68, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila68, "");
		$Fila68++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A443:O443')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A444:O444')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A443','METFORMINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B443','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C443','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A444','TABLETAS');
	
	foreach ($model->ReporteDR('69') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila69, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila69, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila69, "");
		$Fila69++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A450:O450')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A451:O451')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A450','METFORMINA + GLIMEPIRIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B450','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C450','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A451','TABLETAS');
	
	foreach ($model->ReporteDR('70') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila70, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila70, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila70, "");
		$Fila70++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A461:O461')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A462:O462')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A461','METFORMINA + GLIBENCLAMIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B461','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C461','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A462','TABLETAS');
	
	foreach ($model->ReporteDR('71') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila71, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila71, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila71, "");
		$Fila71++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A466:O466')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A467:O467')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A466','GLIMEPIRIDA');
	$objPHPExcel->getActiveSheet()->setCellValue('B466','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C466','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A467','TABLETAS');
	
	foreach ($model->ReporteDR('72') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila72, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila72, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila72, "");
		$Fila72++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A470:O470')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A471:O471')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A477:O477')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A483:O483')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A470','PREGABALINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B470','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C470','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A471','TABLETAS 75 MG');
	$objPHPExcel->getActiveSheet()->setCellValue('A477','TABLETAS 150 MG');
	$objPHPExcel->getActiveSheet()->setCellValue('A483','TABLETAS 300 MG');
	
	foreach ($model->ReporteDR('73') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila73, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila73, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila73, "");
		$Fila73++;
	}
	
	foreach ($model->ReporteDR('74') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila74, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila74, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila74, "");
		$Fila74++;
	}
	
	foreach ($model->ReporteDR('75') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila75, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila75, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila75, "");
		$Fila75++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A488:O488')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A489:O489')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A488','GABAPENTINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B488','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C488','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A489','TABLETAS');
	
	foreach ($model->ReporteDR('76') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila76, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila76, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila76, "");
		$Fila76++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A494:O494')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A495:O495')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A494','FLUNARIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B494','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C494','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A495','TABLETAS');
	
	foreach ($model->ReporteDR('77') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila77, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila77, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila77, "");
		$Fila77++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A500:O500')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A501:O501')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A500','CINARIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B500','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C500','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A501','TABLETAS');
	
	foreach ($model->ReporteDR('78') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila78, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila78, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila78, "");
		$Fila78++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A504:O504')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A505:O505')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A509:O509')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A512:O512')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A504','GINGKO BILOBA');
	$objPHPExcel->getActiveSheet()->setCellValue('B504','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C504','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A505','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A509','GOTAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A512','TABLETAS');
	
	foreach ($model->ReporteDR('79') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila79, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila79, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila79, "");
		$Fila79++;
	}
	
	foreach ($model->ReporteDR('80') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila80, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila80, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila80, "");
		$Fila80++;
	}
	
	foreach ($model->ReporteDR('81') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila81, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila81, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila81, "");
		$Fila81++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A515:O515')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A516:O516')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A528:O528')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A515','ESTEROIDES');
	$objPHPExcel->getActiveSheet()->setCellValue('B515','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C515','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A516','AMPOLLAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A528','TABLETAS');
	
	foreach ($model->ReporteDR('82') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila82, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila82, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila82, "");
		$Fila82++;
	}
	foreach ($model->ReporteDR('83') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila83, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila83, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila83, "");
		$Fila83++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A531:O531')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A532:O532')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A531','PREDNISOLONA');
	$objPHPExcel->getActiveSheet()->setCellValue('B531','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C531','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A532','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('85') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila84, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila84, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila84, "");
		$Fila84++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A536:O536')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A537:O537')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A536','ANTIHISTAMINICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B536','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C536','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A537','TABLETAS');
	
	foreach ($model->ReporteDR('86') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila85, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila85, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila85, "");
		$Fila85++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A541:O541')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A542:O542')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A545:O545')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A541','RUPATADINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B541','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C541','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A542','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A545','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('87') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila86, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila86, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila86, "");
		$Fila86++;
	}
	
	foreach ($model->ReporteDR('88') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila87, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila87, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila87, "");
		$Fila87++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A548:O548')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A549:O549')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A555:O555')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A548','DESLORATADINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B548','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C548','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A549','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A555','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('89') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila88, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila88, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila88, "");
		$Fila88++;
	}
	
	foreach ($model->ReporteDR('90') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila89, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila89, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila89, "");
		$Fila89++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A562:O562')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A563:O563')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A567:O567')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A562','CETIRIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B563','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C563','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A563','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A567','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('91') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila90, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila90, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila90, "");
		$Fila90++;
	}
	
	foreach ($model->ReporteDR('92') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila91, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila91, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila91, "");
		$Fila91++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A573:O573')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A574:O574')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A573','LEVOCETIRIZINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B573','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C573','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A574','TABLETAS');
	
	foreach ($model->ReporteDR('93') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila92, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila92, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila92, "");
		$Fila92++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A577:O577')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A578:O578')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A577','ANTITUSIVO');
	$objPHPExcel->getActiveSheet()->setCellValue('B577','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C577','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A578','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('94') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila93, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila93, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila93, "");
		$Fila93++;
	}
	$objPHPExcel->getActiveSheet()->getStyle('A612:O612')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A613:O613')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A612','AMBROXOL + CLEMBUTEROL');
	$objPHPExcel->getActiveSheet()->setCellValue('B612','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C612','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A613','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('95') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila94, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila94, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila94, "");
		$Fila94++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A618:O618')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A619:O619')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A618','AMBROXOL + SALBUTAMOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B618','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C618','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A619','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('96') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila95, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila95, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila95, "");
		$Fila95++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A623:O623')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A624:O624')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A623','AMBROXOL + LORATADINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B623','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C623','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A624','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('97') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila96, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila96, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila96, "");
		$Fila96++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A629:O629')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A630:O630')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A629','AMBROXOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B629','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C629','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A630','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('98') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila97, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila97, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila97, "");
		$Fila97++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A635:O635')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A636:O636')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A635','HEDERA HELIX');
	$objPHPExcel->getActiveSheet()->setCellValue('B635','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C635','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A636','SUSPENSIÓN');
	
	foreach ($model->ReporteDR('99') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila98, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila98, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila98, "");
		$Fila98++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A648:O648')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A649:O649')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A648','ANSIOLITICOS ANTIDEPRESIVOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B648','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C648','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A649','TABLETAS');
	
	foreach ($model->ReporteDR('100') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila99, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila99, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila99, "");
		$Fila99++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A655:O655')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A656:O656')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A655','ALPRAZOLAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B655','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C655','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A656','TABLETAS');
	
	foreach ($model->ReporteDR('101') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila100, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila100, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila100, "");
		$Fila100++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A661:O661')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A662:O662')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A661','BROMAZEPAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B661','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C661','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A662','TABLETAS');
	
	foreach ($model->ReporteDR('102') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila101, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila101, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila101, "");
		$Fila101++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A667:O667')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A668:O668')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A667','CITALOPRAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B667','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C667','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A668','TABLETAS');
	
	foreach ($model->ReporteDR('103') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila102, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila102, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila102, "");
		$Fila102++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A671:O671')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A672:O672')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A671','ESCITALOPRAM');
	$objPHPExcel->getActiveSheet()->setCellValue('B671','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C671','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A672','TABLETAS');
	
	foreach ($model->ReporteDR('104') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila103, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila103, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila103, "");
		$Fila103++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A676:O676')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A677:O677')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A676','SERTRALINA');
	$objPHPExcel->getActiveSheet()->setCellValue('B676','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C676','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A677','TABLETAS');
	
	foreach ($model->ReporteDR('105') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila104, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila104, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila104, "");
		$Fila104++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A680:O680')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A681:O681')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A680','ANTIHIPERTENSIVO');
	$objPHPExcel->getActiveSheet()->setCellValue('B680','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C680','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A681','TABLETAS');
	
	foreach ($model->ReporteDR('106') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila105, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila105, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila105, "");
		$Fila105++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A685:O685')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A686:O686')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A697:O697')->applyFromArray($boldArrayY);
    $objPHPExcel->getActiveSheet()->getStyle('A702:O702')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A685','SISTEMA NERVIOSO CENTRAL');
	$objPHPExcel->getActiveSheet()->setCellValue('B685','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C685','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A686','TABLETAS');
	$objPHPExcel->getActiveSheet()->setCellValue('A697','SUSPENSIÓN');
	$objPHPExcel->getActiveSheet()->setCellValue('A702','AMPOLLA');
	
	foreach ($model->ReporteDR('107') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila106, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila106, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila106, "");
		$Fila106++;
	}
	
	foreach ($model->ReporteDR('108') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila107, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila107, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila107, "");
		$Fila107++;
	}
	
	foreach ($model->ReporteDR('109') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila108, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila108, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila108, "");
		$Fila108++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A705:O705')->applyFromArray($boldArray);
	$objPHPExcel->getActiveSheet()->getStyle('A706:O706')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A707:O707')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A705','ANTIMICOTICOS');
   	$objPHPExcel->getActiveSheet()->setCellValue('A706','FLUCONAZOL');
	$objPHPExcel->getActiveSheet()->setCellValue('B706','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C706','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A707','TABLETAS');
	
	foreach ($model->ReporteDR('110') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila109, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila109, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila109, "");
		$Fila109++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A717:O717')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A718:O718')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A717','GINECOLÓGICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B717','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C717','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A718','TABLETAS');
	
	foreach ($model->ReporteDR('111') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila110, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila110, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila110, "");
		$Fila110++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A727:O727')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A728:O728')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A727','OFTALMOLÓGICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B727','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C727','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A728','GOTAS');
	
	foreach ($model->ReporteDR('112') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila111, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila111, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila111, "");
		$Fila111++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A733:O733')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A734:O734')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A733','ÓTICOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B733','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C733','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A734','GOTAS');
	
	foreach ($model->ReporteDR('113') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila112, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila112, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila112, "");
		$Fila112++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A737:O737')->applyFromArray($boldArray);
    $objPHPExcel->getActiveSheet()->getStyle('A738:O738')->applyFromArray($boldArrayY);
   	$objPHPExcel->getActiveSheet()->setCellValue('A737','GOTAS NASALES');
	$objPHPExcel->getActiveSheet()->setCellValue('B737','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C737','Notas');
	$objPHPExcel->getActiveSheet()->setCellValue('A738','GOTAS');
	
	foreach ($model->ReporteDR('114') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila113, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila113, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila113, "");
		$Fila113++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A741:O741')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A741','CREMAS COMBINADAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B741','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C741','Notas');
	
	foreach ($model->ReporteDR('115') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila114, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila114, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila114, "");
		$Fila114++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A745:O745')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A745','CREMAS VARIAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B745','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C745','Notas');
	
	foreach ($model->ReporteDR('116') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila115, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila115, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila115, "");
		$Fila115++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A756:O756')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A756','VARIOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B756','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C756','Notas');
	
	foreach ($model->ReporteDR('117') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila116, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila116, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila116, "");
		$Fila116++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A760:O760')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A760','NUEVOS AGREGADOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B760','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C760','Notas');
	
	foreach ($model->ReporteDR('119') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila118, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila118, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila118, "");
		$Fila118++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A767:O767')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A767','PRODUCTOS GLOBAL FARMA, SA');
	$objPHPExcel->getActiveSheet()->setCellValue('B767','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C767','Notas');
	
	foreach ($model->ReporteDR('120') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila119, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila119, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila119, "");
		$Fila119++;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle('A793:O793')->applyFromArray($boldArray);
   	$objPHPExcel->getActiveSheet()->setCellValue('A793','OTROS MEDICAMENTOS');
	$objPHPExcel->getActiveSheet()->setCellValue('B793','Total Existencia General');
	$objPHPExcel->getActiveSheet()->setCellValue('C793','Notas');
	
	foreach ($model->ReporteDR('121') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila120, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila120, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila120, "");
		$Fila120++;
	}
		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Listado Doctor.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>