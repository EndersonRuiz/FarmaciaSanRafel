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


	 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(60);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);

 $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
  PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
  $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->applyFromArray($boldArray);

	//ENCAVEZADOS

    $objPHPExcel->getActiveSheet()->setCellValue('A1','PRODUCTO VENDIDO');
     $objPHPExcel->getActiveSheet()->setCellValue('B1','PRECIO COSTO');
      $objPHPExcel->getActiveSheet()->setCellValue('C1','PRECIO TOPE');
	$objPHPExcel->getActiveSheet()->setCellValue('D1','CANTIDAD');
	$objPHPExcel->getActiveSheet()->setCellValue('E1','TOTAL EFECTIVO ');


	//RECORRER LA CONSULTA Y CARGARLA A EXCEL
foreach ($model->Listarz125('1',$_REQUEST['Inicio'],$_REQUEST['InicioFin']) as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->Total));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->total2));
		$Fila++;
	}
		// Redirect output to a client???s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="VentaGeneral.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>