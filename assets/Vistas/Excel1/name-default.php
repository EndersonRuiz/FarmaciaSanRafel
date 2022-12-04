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

	$model = new Empleados();

	//FILA DONDE INICIAREMOS

	$Fila = 2;

	//INSTANCIA DE PHP EXCEL

	$objPHPExcel = new PHPExcel();

	//HOJA DONDE INICIAMOS

	$objPHPExcel->setActiveSheetIndex(0);

	//TITULO DE HOJA

	$objPHPExcel->getActiveSheet()->setTitle("Empleados");

	//ENCAVEZADOS

	$objPHPExcel->getActiveSheet()->setCellValue('A1','Id');
	$objPHPExcel->getActiveSheet()->setCellValue('B1','PrimerNombre');
	$objPHPExcel->getActiveSheet()->setCellValue('C1','SegundoNombre');
	$objPHPExcel->getActiveSheet()->setCellValue('D1','PrimerApellido');
	$objPHPExcel->getActiveSheet()->setCellValue('E1','SegundoApellido');

	//RECORRER LA CONSULTA Y CARGARLA A EXCEL

	foreach ($model->Reporte() as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->Codigo));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->PrimerNombre));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->SegundoNombre));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->PrimerApellido));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->SegundoApellido));
		$Fila++;
	}

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Empleados.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>