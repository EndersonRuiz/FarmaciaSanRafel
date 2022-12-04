<?
	//INSTANCIAR LA CLASE COMPRAS

	$model = new Notifications ();

	//MENSAJE DE COMPRA EXITOSA

    $json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i>Entrada Producto Correcto</font>';
	$json['success'] = true;

	 try{

        $modelonumero = $_REQUEST['Inicio'];
	 	$model->CodigoReservado1($modelonumero);
	 	if ($modelonumero == $model->getCodigoRes()) {
            $codigoUser = $model->getCodigo();
	 		$model->MarcarPedido($_REQUEST['Codigo'],$codigoUser);

             $json['success'] = true;
             echo json_encode($json);
	 	}
	 }catch(PDOException $e){
	 	$json['msj'] = $e->getMessage();
		$json['success'] = false;
		echo json_encode($json);
	 }
	
?>