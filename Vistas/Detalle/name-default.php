<?
	//CONTINUAR LAS SESIONES O INICIAR

	session_start();

	//INSTANCIA DE LA CLASE COMPRASNDE SE REALIZA LA LOGICA DE NEGOSCIO
	$model = new Compras ();
	
	$Sumaa= 0;
	$Suma = 0;
	$Suma = ($_POST['Cantidad'] + $_POST['Bonificacion'] + 0);
	$Sumaa =($Suma * $_POST['PrecioCosto']);

	//VERIFICAR QUE SE RECIVVA LAS VARIABLES PARA ASIGNARLAS A UN ARRAY DE SESIONES

	if (isset($_POST['IdInventario']))
	{
		foreach ($model->ObtenerProducto($_POST['IdInventario']) as $r) {
			$_SESSION['Detalle'][$_POST['IdInventario']] = array('id'=>$r->Codigo, 
				'producto'=>$r->NombreProducto,
				'cant' => $Suma,
				'totall' => $Sumaa,
				'cantt' => $_POST['Cantidad'],
				'boni' => $_POST['Bonificacion'],
				'precioc' => $_POST['PrecioCosto'],
				'preciot' => $_POST['PrecioTope'],
				'preciov' => $_POST['PrecioVenta'],
				'vencimiento' => $_POST['FechaVencimiento'],
				'exist' => $_POST['Existencia'],
				'idp' => $_POST['IdProducto'],
				'numerofac' => $_POST['NumeroFactura'],
				'laboratori' => $_POST['Laboratorio'],
				'idusuari' => $_POST['IdUsuario'],
				'factur' => $_POST['FechaFac1'],
				'descrip' => $_POST['Descripcion']
 			);
		}
	}

	//MENSAJE DE ALRTIFY POR MEDIO DE JSON

	$json['name'] = 'position';
	$json['defaultValue'] = 'top-right';
	$json['msj'] = '<font color="#ffffff"><i class="fa fa-check"></i> Producto Agregado</font>';
	$json['success'] = true;

	//MANDAR LA RESPUESTA JSON A JQU
	
	echo json_encode($json);
?>