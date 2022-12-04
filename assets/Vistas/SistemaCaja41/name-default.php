<?
	//INSTANCIAR LA CLASE COMPRAS

	$model = new VentasSanJuan ();

	//MENSAJE DE COMPRA EXITOSA

    $json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i>Abrio Caja Con Exito</font>';
	$json['success'] = true;

	$usuario = $_POST['usuario'];
	$apertura = $_POST['apertura'];
	$Estado = $_POST['EstadoCajaAbrir'];
	$Turnos = $_POST['Turnos'];

	$model->ObtenerCodigo1($usuario);
    $CodigoUsuario = $model->getCodigoRes();
    $CodigoUsuario1 = $model->getCodigo();
   
	 try{
	 	if ($CodigoUsuario != '' and $CodigoUsuario == $usuario and $Estado == '0') {
	 		$model->setCodigo($CodigoUsuario1);
	 		$model->setBono($apertura);
	 		$model->setCantidad($Turnos);
            $model->AbrirCaja1();

             $json['success'] = true;
	         $json['id'] = $idventa;
             echo json_encode($json);
	 	}else{
	 		$json['name'] = 'position';
	        $json['defaultValue'] = 'top-right';
	 		$json['msj'] = '<font color="#ffffff"><i class="fa fa-times"></i>Codigo Usuario No valido</font>';
	 		$json['success'] = true;
	 	}

	 }catch(PDOException $e){
	 	$json['msj'] = $e->getMessage();
		$json['success'] = false;
		echo json_encode($json);
	 }
	
?>