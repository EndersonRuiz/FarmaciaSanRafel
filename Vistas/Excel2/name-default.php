<?
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);
  date_default_timezone_set('Europe/London');
  if(PHP_SAPI == 'cli')
  	die('This example should only be run from a web Browser ');

    //Cargar la clase php Exel
  require 'Classes/PHPExcel.php';

  //Modelo que traera la consulta
  $model = new Compras();

  //Fila donde Iniciaremos
  $Fila = 2;

  //Instancia de la Clase php Excel
  $objPHPExcel = new PHPExcel();

  //Hoja donde Iniciamos
  $objPHPExcel->setActiveSheetIndex(0);

  //Titulo de la Hoja
  $objPHPExcel->getActiveSheet()->setTitle("Salida de Sucursales");

  //PARA ANCHO DE LAS COLUMNAS
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);


  //PARA NOMBRE DE LAS COLUMNAS DEL PDF
  $objPHPExcel->getActiveSheet()->setCellValue('A1','Fecha Invio');
  $objPHPExcel->getActiveSheet()->setCellValue('B1','Hora Envio');
  $objPHPExcel->getActiveSheet()->setCellValue('C1','Nombre del Producto');
  $objPHPExcel->getActiveSheet()->setCellValue('D1','Cant.');
  $objPHPExcel->getActiveSheet()->setCellValue('E1','PrecioTope');
  $objPHPExcel->getActiveSheet()->setCellValue('F1','PrecioVenta');
  $objPHPExcel->getActiveSheet()->setCellValue('G1','FechaV');
  $objPHPExcel->getActiveSheet()->setCellValue('H1','NombreEnvia');
  $objPHPExcel->getActiveSheet()->setCellValue('I1','SucursalRecibe');


  //Fuente de la primera fila en negrita
  $boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => 
  PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
  $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($boldArray);


  //traemos la consulta y cargamos a excel los resultados
  foreach ($model->ConsultaPorMes('1',$_REQUEST['Sucursal1'],$_REQUEST['Sucursal2'],$_REQUEST['Fecha1']
         ,$_REQUEST['Fecha2']) as $r) 
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->Fecha));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->Hora));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->NombreProducto));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->Cantidad));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$Fila, ($r->PrecioTope));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$Fila, ($r->PrecioVenta));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$Fila, ($r->FechaVencimiento));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$Fila, ($r->NombreCompleto));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$Fila, ($r->Nombre));
		$Fila++;
	}

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="SalidaSucursalesPorFecha.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
?>