<?
	//INCIAR O CONTINUAR LAS SESIONES

	session_start();

	//INSTANCIAR LA CLASE COMPRAS

	$model = new Pedidos ();
	$model_2 = new DetallePedido ();
	$model_3 = new Ventas ();

	//MENSAJE DE COMPRA EXITOSA

	$json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> Salidas Registrada</font>';
	$json['success'] = true;

	//VERIFICAR SI EXISTE LA SESION PARA RECORRELA Y ENVIAR LOS DETALLES A GUARDAR

	if (count($_SESSION['DetalleSalida'])>0) 
	{
		try 
		{

			//CREAMOS LA FACTURA O COMPRA

			$idusuarioenvia;
			$idusuariosolicita;
			$Origen;
			$Destino;
			$Comentt;

			foreach($_SESSION['DetalleSalida'] as $detalle):
				$idusuarioenvia = $detalle['userenvia'];
				$idusuariosolicita = $detalle['usersolicita'];
				$Origen = $detalle['origen'];
				$Destino = $detalle['destino'];
				$Comentt = $detalle['comentarie'];
			endforeach;

			$model_3->ObtenerCodigo11($idusuarioenvia);
			$Codigoo = $model_3->getCodigoo();
			$CodigoRes = $model_3->getCodigoRes();

			//MANDAR VALORES A LOS METODOS SETTERS
         if($CodigoRes == $idusuarioenvia){
            $model->setEstado('1');
            $model->setComentario($Comentt);

			//INSERTAR LA FACTURA O COMPRA

			$model->Insertar();

			//OBTENER EL CODIGO

			$model_2->ObtenerCodigo ();

			$CodigoSalida = $model_2->getCodigo ();

			$model->setIdUsuario1($Codigoo);
			$model->setOrigen($Origen);
			$model->InsertarDetalleEnvia($CodigoSalida);

			$model->setIdUsuario2($idusuariosolicita);
			$model->setDestino($Destino);
			$model->InsertarDetalleRecibe($CodigoSalida);

			foreach ($_SESSION['DetalleSalida'] as $detalle) 
			{

				$model_2->setIdPedido($CodigoSalida);
                $model_2->setIdInventario($detalle['id']);
                $model_2->setCantidad($detalle['cantidad']);
                $model_2->InsertarDetalle ();
			}
			
			$_SESSION['DetalleSalida'] = array();
					
			$json['success'] = true;
			$json['id'] = $idventa;
			echo json_encode($json);
		}

		}
		catch (PDOException $e) 
		{
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
	}
	else
	{
		$json['msj'] = 'No hay productos agregados';
		$json['success'] = false;
		echo json_encode($json);
	}
	
?>