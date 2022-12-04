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

	$model = new  Inventario();

	//FILA DONDE INICIAREMOS

	$Fila = 2;

	//INSTANCIA DE PHP EXCEL

	$objPHPExcel = new PHPExcel();

	//HOJA DONDE INICIAMOS

	$objPHPExcel->setActiveSheetIndex(0);

	//TITULO DE HOJA

	$objPHPExcel->getActiveSheet()->setTitle("Inventario General");

	//ENCAVEZADOS
     $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(60);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);

 $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
  PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
  $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($boldArray);

	$objPHPExcel->getActiveSheet()->setCellValue('A1','Medicamento');
	$objPHPExcel->getActiveSheet()->setCellValue('B1','Unidad de Medida');
	$objPHPExcel->getActiveSheet()->setCellValue('C1','Cantidad');
	$objPHPExcel->getActiveSheet()->setCellValue('D1','Costo Unidad');

	//RECORRER LA CONSULTA Y CARGARLA A EXCEL

	foreach ($model->Listar() as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->Nombre));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->PrecioCosto));
		$Fila++;
	}

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Inventario.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>