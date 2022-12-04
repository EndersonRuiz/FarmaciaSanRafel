<?php 	
	
	//INSTANCIA DE LA CLASE PRODUCTOS

	$model = new Ventas ();

	//RECIBIR EL ID DE FILA ELEGIDA POR EL METODO POST

	$productId = $_POST['ProductoVenta'];

	//MANDAR LOS DATOS DEL RESULSET A UN OBJECT

	foreach ($model->ObtenerDatosVenta($productId) as $row):
	endforeach;

    //MANDAR LA RESPUESTA DEL TEXTO JSON

	echo json_encode($row);
?>
