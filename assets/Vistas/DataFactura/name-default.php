<?php 	
	
	//INSTANCIA DE LA CLASE PRODUCTOS

	$model = new Compras ();

	//RECIBIR EL ID DE FILA ELEGIDA POR EL METODO POST

	$productId = $_POST['productId'];

	//MANDAR LOS DATOS DEL RESULSET A UN OBJECT

	foreach ($model->ObtenerDatosModalProducto($productId) as $row):
	endforeach;

    //MANDAR LA RESPUESTA DEL TEXTO JSON

	echo json_encode($row);
?>

