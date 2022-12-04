<?
	//INSTANCIAR LA CLASE COMPRAS

	$model = new Ventas ();

	//MENSAJE DE COMPRA EXITOSA

    $json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i>Salida Efectivo Correcto</font>';
	$json['success'] = true;

	$CodigoCajaa = $_POST['CodigoCajaa'];
	$CodigoEstado = $_POST['CodigoEstado'];
	$CantidadSalida1 = $_POST['CantidadSalidaa'];
	$Comentario2 = $_POST['Comentarioo'];

	$model->ObtenerMontoCaja($CodigoCajaa);
    $Monto = $model->getId();
   
	 try{
	 	if ($CodigoEstado == '1' and $Monto >= $CantidadSalida1) {

	 		$model->setCodigo($CodigoCajaa);
	 		$model->setBono($CantidadSalida1);
	 		$model->setIdUsuario($Comentario2);
            $model->InsertarSalidasss();

             $json['success'] = true;
	         $json['id'] = $idventa;
             echo json_encode($json);
	 	}else{
	 		$json['name'] = 'position';
	        $json['defaultValue'] = 'top-right';
	 		$json['msj'] = '<font color="#ffffff"><i class="fa fa-times"></i>Abra Caja</font>';
	 		$json['success'] = true;
	 	}

	 }catch(PDOException $e){
	 	$json['msj'] = $e->getMessage();
		$json['success'] = false;
		echo json_encode($json);
	 }
	
?>