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

	$Fila = 2;
	$Fila2 = 2;

	//INSTANCIA DE PHP EXCEL

	$objPHPExcel = new PHPExcel();

	//HOJA DONDE INICIAMOS

	$objPHPExcel->setActiveSheetIndex(0);

	//TITULO DE HOJA

	$objPHPExcel->getActiveSheet()->setTitle("Ventas");

	//ENCAVEZADOS
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(55);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);

    $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
    $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($boldArray);

    $objPHPExcel->getActiveSheet()->setCellValue('A1','NombreProducto');
	$objPHPExcel->getActiveSheet()->setCellValue('B1','Cantidad');
	$objPHPExcel->getActiveSheet()->setCellValue('C1','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('D1','SubTotal');
	$objPHPExcel->getActiveSheet()->setCellValue('E1','Hora');
	$objPHPExcel->getActiveSheet()->setCellValue('F1','NombreDependiente');


	//RECORRER LA CONSULTA Y CARGARLA A EXCEL
	foreach ($model->Listarzz3('1',$_REQUEST['Inicio'],$_REQUEST['HoraInicio'],$_REQUEST['HoraFin'],$_REQUEST['Sucursal']) as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->TotalVendido));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->hora));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->NombreCompleto));
		$Fila++;
	}

		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, (""));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$Fila, (""));
		$Fila++;
	
	foreach ($model->Listarz1as1('1',$_REQUEST['Inicio'],$_REQUEST['HoraInicio'],$_REQUEST['HoraFin'],$_REQUEST['Sucursal']) as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->NombreCompleto));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$Fila, ($r->Resultado2));
		$Fila++;
	}
	foreach ($model->Listarz1as('1',$_REQUEST['Inicio'],$_REQUEST['HoraInicio'],$_REQUEST['HoraFin'],$_REQUEST['Sucursal']) as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->total));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$Fila, ($r->resultado1));
		$Fila++;
	}

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Salidas_Ventas.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>