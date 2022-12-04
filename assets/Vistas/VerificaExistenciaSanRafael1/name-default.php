<?
	//CONTINUAR LAS SESIONES O INICIAR

	session_start();

	//INSTANCIA DE LA CLASE INVENTARIO

	$model = new Inventario ();

	//ARRAY QUE SIRVE PARA DEVOLVER EL JSON

	$json;

	//VARIABLE PARA RECIBIR EL VALOR DE LA EXISTENCIA

	$Stock;

	//HACER FETCH A LA VARIABLE STOCK EN BASE AL CODIGO DE INVENTARIO RECIBIDO

	foreach ($model->VerificaStock ($_POST['Codigo']) as $Stock):
	endforeach;

	//RECIBIR LA CANTIDAD INGRESADA POR EL USUARIO
	 
	$Cantidad = $_POST['Cant'];

	//VERIFICAR LA CANTIDAD INGRESADA POR EL USUARIO

	if (($Cantidad <= 0) || ($Cantidad > $Stock->Existencia))
	{
		if($Cantidad == 0)
		{
			$json['name'] = 'position';
			$json['defaultValue'] = 'top-right';
			$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> El valor cero no es valido</font>';
			$json['error'] = true;
		}
	 	if($Cantidad > $Stock->Existencia)
		{
			$json['name'] = 'position';
			$json['defaultValue'] = 'top-right';
			$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> No cuenta con suficiente existencia</font>';
			$json['error'] = true;
		}
	}
	else
	{
		//VERIFICAR QUE SE RECIVVA LAS VARIABLES PARA ASIGNARLAS A UN ARRAY DE SESIONES

		if (isset($_POST['Codigo']))
		{
			foreach ($model->ObtenerProductoF($_POST['Codigo']) as $r) {
				$_SESSION['DetalleSanRafael'][$_POST['Codigo']] = array('id'=>$r->Codigo, 
					'producto' => $r->NombreProducto, 
					'sucursal' => $r->NameSucursal,
					'cantidad' => $Cantidad,
					'precio'   => $r->PrecioVenta,
					'subtotal' => ($Cantidad * $r->PrecioVenta)
				);
			}
		}

		$json['name'] = 'position';
		$json['defaultValue'] = 'top-right';
		$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> producto agregado a la factura</font>';
		$json['success'] = true;
	}

	echo json_encode($json);
?>