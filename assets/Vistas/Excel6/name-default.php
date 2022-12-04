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

	//INSTANCIA DE PHP EXCEL

	$objPHPExcel = new PHPExcel();

	//HOJA DONDE INICIAMOS

	$objPHPExcel->setActiveSheetIndex(0);

	//TITULO DE HOJA

	$objPHPExcel->getActiveSheet()->setTitle("Empleados");

	 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
   $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(9);
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(12);

 $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
  PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
  $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->applyFromArray($boldArray);

	//ENCAVEZADOS

	$objPHPExcel->getActiveSheet()->setCellValue('A1','Id');
	$objPHPExcel->getActiveSheet()->setCellValue('B1','FechaV');
	$objPHPExcel->getActiveSheet()->setCellValue('C1','CodigoBarra');
	$objPHPExcel->getActiveSheet()->setCellValue('D1','Medicamento');
	$objPHPExcel->getActiveSheet()->setCellValue('E1','Existencia');
	$objPHPExcel->getActiveSheet()->setCellValue('F1','PrecioCosto');
	$objPHPExcel->getActiveSheet()->setCellValue('G1','PrecioTope');
	$objPHPExcel->getActiveSheet()->setCellValue('H1','PrecioVenta');
	$objPHPExcel->getActiveSheet()->setCellValue('I1','Categoria');
	$objPHPExcel->getActiveSheet()->setCellValue('J1','Medida');
	$objPHPExcel->getActiveSheet()->setCellValue('K1','Estante');
	$objPHPExcel->getActiveSheet()->setCellValue('L1','Seccion');
	$objPHPExcel->getActiveSheet()->setCellValue('M1','Casa');
	$objPHPExcel->getActiveSheet()->setCellValue('N1','Marca');
	$objPHPExcel->getActiveSheet()->setCellValue('O1','Sucursal');


	//RECORRER LA CONSULTA Y CARGARLA A EXCEL

	foreach ($model->Listar('3') as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->CodInventario));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->FechaVencimiento));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->CodigoBarra));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->Existencia));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->PrecioCosto));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$Fila, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$Fila, ($r->PrecioVenta));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$Fila, ($r->Nombre));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$Fila, ($r->Medida));
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$Fila, ($r->Estante));
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$Fila, ($r->Seccion));
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$Fila, ($r->NameCasa));
		$objPHPExcel->getActiveSheet()->setCellValue('N'.$Fila, ($r->NameMarca));
		$objPHPExcel->getActiveSheet()->setCellValue('O'.$Fila, ($r->Sucursal));
		$Fila++;
	}

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="InventarioBodega.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>