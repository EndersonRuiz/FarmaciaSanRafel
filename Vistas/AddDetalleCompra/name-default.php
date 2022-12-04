<?
	//INCIAR O CONTINUAR LAS SESIONES

	session_start();

	//INSTANCIAR LA CLASE COMPRAS

	$model = new Compras ();

	//OBTENER EL CODIGO DE LA ULTIMA COMPRA 

	$model->ObtenerCodigo ();
	$NumFactura = $model->getCodigo ();
	$NumFactura = $NumFactura + 1;

	//MENSAJE DE COMPRA EXITOSA

	$json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> Compra Registrada</font>';
	$json['success'] = true;

	//VERIFICAR SI EXISTE LA SESION PARA RECORRELA Y ENVIAR LOS DETALLES A GUARDAR

	if (count($_SESSION['Detalle'])>0) 
	{
		try 
		{

			//CREAMOS LA FACTURA O COMPRA

			$idusuario;
			$NoFactura;
			$Laboratorio;
			$total1 = 0;
			$Factura;
			$descripcion;
	

			//RECORREMOS LA SECION PARA HACER FETCH A VARIABLES

			foreach($_SESSION['Detalle'] as $detalle):
				$total1 += $detalle['totall'];

				$NoFactura = $detalle['numerofac'];
				$Laboratorio = $detalle['laboratori'];
				$idusuario = $detalle['idusuari'];
				$Factura = $detalle['factur'];
				$descripcion = $detalle['descrip'];
			endforeach;

			//MANDAR VALORES A LOS METODOS SETTERS
			$model->setNoFactura ($NoFactura);
			$model->setLaboratorio($Laboratorio);
			$model->setIdUsuario($idusuario);
			$model->setTotal($total1);
			$model->setFactura($Factura);
			$model->setDescripcion($descripcion);

			//INSERTAR LA FACTURA O COMPRA

			$model->Insertar();

			//RECORRER PARA MANDAR LOS DETALLES

			foreach($_SESSION['Detalle'] as $detalle):
				
                $model->setIdCompra ($NumFactura);
                $model->setProducto ($detalle['id']);
                $model->setCantidad ($detalle['cantt']);
                $model->setBonificacion ($detalle['boni']);
                $model->setPrecioCosto ($detalle['precioc']);
                $model->setPrecioTope($detalle['preciot']);
                $model->setPrecioVenta ($detalle['preciov']);
                $model->setFechaVencimiento ($detalle['vencimiento']);
                $model->setExistencia ($detalle['exist']);
                $model->setIdProducto ($detalle['idp']);

                $model->InsertarDetalle ();
			endforeach;
			
			$_SESSION['Detalle'] = array();
					
			$json['success'] = true;
			$json['id'] = $idventa;

			echo json_encode($json);

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