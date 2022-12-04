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
	$model = new Kardex();

	//FILA DONDE INICIAREMOS
	$Fila = 3;

	//INSTANCIA DE PHP EXCEL
	$objPHPExcel = new PHPExcel();

	//HOJA DONDE INICIAMOS
	$objPHPExcel->setActiveSheetIndex(0);

	//TITULO DE HOJA
	$objPHPExcel->getActiveSheet()->setTitle("Novendidos");

	if($_POST['SucursalSan'] == 5){

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);

		//ENCAVEZADOS
		$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
		$objPHPExcel->getActiveSheet()->setCellValue('A1','Farmacia San Rafael 1 Productos No Vendidos');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); 


		$objPHPExcel->getActiveSheet()->setCellValue('A2','Codigo');
		$objPHPExcel->getActiveSheet()->setCellValue('B2','NombreProducto');
		$objPHPExcel->getActiveSheet()->setCellValue('C2','Existencia');
		$objPHPExcel->getActiveSheet()->setCellValue('D2','PrecioCosto');

		//RECORRER LA CONSULTA Y CARGARLA A EXCEL
		foreach ($model->ProductosSinVender($_POST['FechaIni'],$_POST['FechaFin']) as $r) 
			{
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->Codigo));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->NombreProducto));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->Existencia));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->PrecioCosto));
			$Fila++;
			}
	}else if($_POST['SucursalSan'] == 1){
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);

		//ENCAVEZADOS
		$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
		$objPHPExcel->getActiveSheet()->setCellValue('A1','Farmacia San Juan Productos No Vendidos');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); 


		$objPHPExcel->getActiveSheet()->setCellValue('A2','Codigo');
		$objPHPExcel->getActiveSheet()->setCellValue('B2','NombreProducto');
		$objPHPExcel->getActiveSheet()->setCellValue('C2','Existencia');
		$objPHPExcel->getActiveSheet()->setCellValue('D2','PrecioCosto');

		//RECORRER LA CONSULTA Y CARGARLA A EXCEL
		foreach ($model->ProductosSinVenderJuan($_POST['FechaIni'],$_POST['FechaFin']) as $r) 
			{
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->Codigo));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->NombreProducto));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->Existencia));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->PrecioCosto));
			$Fila++;
			}
	}else if($_POST['SucursalSan'] == 4){
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);

		//ENCAVEZADOS
		$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
		$objPHPExcel->getActiveSheet()->setCellValue('A1','Farmacia San Rafael Productos No Vendidos');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); 


		$objPHPExcel->getActiveSheet()->setCellValue('A2','Codigo');
		$objPHPExcel->getActiveSheet()->setCellValue('B2','NombreProducto');
		$objPHPExcel->getActiveSheet()->setCellValue('C2','Existencia');
		$objPHPExcel->getActiveSheet()->setCellValue('D2','PrecioCosto');

		//RECORRER LA CONSULTA Y CARGARLA A EXCEL
		foreach ($model->ProductosSinVenderRafael($_POST['FechaIni'],$_POST['FechaFin']) as $r) 
			{
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$Fila, ($r->Codigo));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$Fila, ($r->NombreProducto));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$Fila, ($r->Existencia));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$Fila, ($r->PrecioCosto));
			$Fila++;
			}
	}

	

		// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Novendidos.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	ob_end_clean();

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>