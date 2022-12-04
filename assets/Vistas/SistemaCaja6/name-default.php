<?
	//INSTANCIAR LA CLASE COMPRAS

	$model = new VentasSanJuan ();

	//MENSAJE DE COMPRA EXITOSA

    $json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i>Cerro Caja Con Exito</font>';
	$json['success'] = true;

    $IdCaja = $_POST['IdCaja'];
    $IdEstado = $_POST['IdEstado'];
    $Billete200 = $_POST['Billete200'];
    $Billete100 = $_POST['Billete100'];
    $Billete50 = $_POST['Billete50'];
    $Billete20 = $_POST['Billete20'];
    $Billete10 = $_POST['Billete10'];
    $Billete5 = $_POST['Billete5'];
    $Billete1 = $_POST['Billete1'];
    $Moneda1 = $_POST['Moneda1'];
    $Moneda50 = $_POST['Moneda50'];
    $Moneda25 = $_POST['Moneda25'];
    $TotalSalidas = $_POST['TotalSalidas'];
    $TotalSuma = $_POST['TotalSuma'];

   
	 try{
	 	if ($IdEstado == '1') {
	 		$model->setId($IdCaja);
	 		$model->setBillete200($Billete200);
	 		$model->setBillete100($Billete100);
	 		$model->setBillete50($Billete50);
	 		$model->setBillete20($Billete20);
	 		$model->setBillete10($Billete10);
	 		$model->setBillete5($Billete5);
	 		$model->setBillete1($Billete1);
	 		$model->setMoneda1($Moneda1);
	 		$model->setMoneda50($Moneda50);
	 		$model->setMoneda25($Moneda25);
	 		$model->setTotal($TotalSalidas);
	 		$model->setTotalVenta($TotalSuma);
            $model->CerrarCajaSanRfa();

             $json['success'] = true;
	         $json['id'] = $idventa;
             echo json_encode($json);
	 	}else{
	 		$json['name'] = 'position';
	        $json['defaultValue'] = 'top-right';
	 		$json['msj'] = '<font color="#ffffff"><i class="fa fa-times"></i>Error NO Previsto</font>';
	 		$json['success'] = true;
	 	}

	 }catch(PDOException $e){
	 	$json['msj'] = $e->getMessage();
		$json['success'] = false;
		echo json_encode($json);
	 }
	
?>