<?php 	
	
	//INSTANCIA DE LA CLASE PRODUCTOS

	$model = new VentasSanJuan ();

	//RECIBIR EL ID DE FILA ELEGIDA POR EL METODO POST

	$productId = $_POST['ProductoVenta'];


	//DIRECTORIO EN DONDE SE ENCUENTRA LA IMAGEN MAS EL NUMERO DE CARPETA EN VASE A LA FILA ELEGIDA

	//MANDAR LOS DATOS DEL RESULSET A UN OBJECT

	foreach ($model->ListarDetalleVenta1($productId) as $r):
		$datos[] = $r;
	endforeach;


	echo json_encode($datos);

	
?>