<?


	//INSTANCIAR LA CLASE COMPRAS

	$model = new VentasSanRafael ();

	//MENSAJE DE COMPRA EXITOSA

    $json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i>Producto No Vendido</font>';
	$json['success'] = true;
	        
	$Codigo = $_POST['CodigoVenta1'];
	 try{
	$model->setCodigo($Codigo);
    $model->EliminarDatosVenta();

    $json['success'] = true;
	$json['id'] = $idventa;
    echo json_encode($json);

	 }catch(PDOException $e){
	 	$json['msj'] = $e->getMessage();
		$json['success'] = false;
		echo json_encode($json);
	 }
	
?>