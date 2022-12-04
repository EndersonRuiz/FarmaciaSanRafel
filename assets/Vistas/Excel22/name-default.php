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

	$objPHPExcel->getActiveSheet()->setTitle("Salidas de Sucursales");

	//ENCAVEZADOS
	 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);

 $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
  PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
  $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($boldArray);


    $objPHPExcel->getActiveSheet()->setCellValue('A1','Fecha Envio');
	$objPHPExcel->getActiveSheet()->setCellValue('B1','Hora Envio');
	$objPHPExcel->getActiveSheet()->setCellValue('C1','Nombre Producto');
	$objPHPExcel->getActiveSheet()->setCellValue('D1','Cantidad');
	$objPHPExcel->getActiveSheet()->setCellValue('E1','Precio Tope');
	$objPHPExcel->getActiveSheet()->setCellValue('F1','Precio Venta');
	$objPHPExcel->getActiveSheet()->setCellValue('G1','Fecha Vencimiento');
	$objPHPExcel->getActiveSheet()->setCellValue('H1','Nombre Envia');
	$objPHPExcel->getActiveSheet()->setCellValue('I1','Sucursal Recibe');


	//RECORRER LA CONSULTA Y CARGARLA A EXCEL
foreach ($model->ListarL('1',$_REQUEST['Inicio'],$_REQUEST['Sucursal'],$_REQUEST['Sucursal1']
         ,$_REQUEST['HoraInicio'],$_REQUEST['HoraFin']) as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->fecha));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->hora));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->PrecioVenta));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$Fila, ($r->FechaVencimiento));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$Fila, ($r->NombreEnvia));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$Fila, ($r->SucursalRecibe));
		$Fila++;
	}

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="SalidasSucursal.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>