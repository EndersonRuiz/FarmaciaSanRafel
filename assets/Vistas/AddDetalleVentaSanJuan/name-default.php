<?
	//INCIAR O CONTINUAR LAS SESIONES

	session_start();

	//INSTANCIAR LA CLASE COMPRAS

	$model = new VentasSanJuan ();

            $idusuario;
            $NoFactura;
            $Laboratorio;
            $Total1 = 0;
            $Factura;
            $descripcion;

            $User = $_POST['User'];
            $TotaldescMas = $_POST['TotaldescMas'];
            $DescuentoMas = $_POST['DescuentoMas'];
            $TotaldescMenos = $_POST['TotaldescMenos'];
            $DescuentoMenos = $_POST['DescuentoMenos'];

	//OBTENER EL CODIGO DE LA ULTIMA Vent
     $model->ObtenerCodigo($User);
    $NumFactura = $model->getCodigo();
    $CodigoUsuario = $model->getCodigoo();
    $CodigoRes = $model->getCodigoRes();
    if($NumFactura == ''){
        $NumFactura = 0;
        $NumFactura = $NumFactura + 1;
    }else{
        $NumFactura = $NumFactura + 1;
    }
    

	//MENSAJE DE COMPRA EXITOSA

	$json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i>Productos Agregados a Caja</font>';
	$json['success'] = true;

	//VERIFICAR SI EXISTE LA SESION PARA RECORRELA Y ENVIAR LOS DETALLES A GUARDAR

	if (count($_SESSION['DetalleSanJuan'])>0) 
	{
		try 
		{

			//CREAMOS LA FACTURA O COMPRA
            if($User == $CodigoRes){
	        if($TotaldescMas == '' && $DescuentoMas == '' && $TotaldescMenos == '' && $DescuentoMenos == '' ){

                foreach($_SESSION['DetalleSanJuan'] as $detalle):
                $Total1 += $detalle['subtotal'];
                endforeach;
                $model->setCodigo($NumFactura);
                $model->setIdUsuario($CodigoUsuario);
                $model->setIdCliente('2');
                $model->setTotal($Total1);
                $model->setBono('0.00');
                $model->setDescuento('0.00');
                $model->setTotalVenta($Total1);
                $model->InsertarVenta();

                 foreach($_SESSION['DetalleSanJuan'] as $detalle):
                $Total1 += $detalle['subtotal'];
                $model->setId($NumFactura);
                $model->setIdInventario($detalle['id']);
                $model->setCantidad($detalle['cantidad']);
                $model->setPrecioCosto($detalle['precio']);
                $model->setTotal($detalle['subtotal']);
                $model->Insertar();
                endforeach;
			   
             }else if ($TotaldescMas == '' && $DescuentoMas == '') {

             	foreach($_SESSION['DetalleSanJuan'] as $detalle):
				$Total1 += $detalle['subtotal'];
                endforeach;
                $model->setCodigo($NumFactura);
                $model->setIdUsuario($CodigoUsuario);
                $model->setIdCliente('2');
                $model->setTotal($Total1);
                $model->setBono('0.00');
                $model->setDescuento($DescuentoMenos);
                $model->setTotalVenta($TotaldescMenos);
                $model->InsertarVenta();

                foreach($_SESSION['DetalleSanJuan'] as $detalle):
    			$model->setId($NumFactura);
                $model->setIdInventario($detalle['id']);
                $model->setCantidad($detalle['cantidad']);
                $model->setPrecioCosto($detalle['precio']);
                $model->setTotal($detalle['subtotal']);
                $model->Insertar();
                endforeach;
             	
             }else if ($TotaldescMenos == '' && $DescuentoMenos == '') {
             	foreach($_SESSION['DetalleSanJuan'] as $detalle):
				$Total1 += $detalle['subtotal'];
                endforeach;
                $model->setCodigo($NumFactura);
                $model->setIdUsuario($CodigoUsuario);
                $model->setIdCliente('2');
                $model->setTotal($Total1);
                $model->setBono($DescuentoMas);
                $model->setDescuento('0.00');
                $model->setTotalVenta($TotaldescMas);
                $model->InsertarVenta();

                foreach($_SESSION['DetalleSanJuan'] as $detalle):
    			$model->setId($NumFactura);
                $model->setIdInventario($detalle['id']);
                $model->setCantidad($detalle['cantidad']);
                $model->setPrecioCosto($detalle['precio']);
                $model->setTotal($detalle['subtotal']);
                $model->Insertar();
                endforeach;
             }
			
			$_SESSION['DetalleSanJuan'] = array();
					
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