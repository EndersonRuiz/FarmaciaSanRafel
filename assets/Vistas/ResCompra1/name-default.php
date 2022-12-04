<?php 	
	
	//INSTANCIA DE LA CLASE PRODUCTOS

	$model = new Compras ();

	//RECIBIR EL ID DE FILA ELEGIDA POR EL METODO POST

	$productId = $_POST['productId'];

	
	//DIRECTORIO EN DONDE SE ENCUENTRA LA IMAGEN MAS EL NUMERO DE CARPETA EN VASE A LA FILA ELEGIDA

	//MANDAR LOS DATOS DEL RESULSET A UN OBJECT
	foreach ($model->ObtenerComentario($productId) as $row):
	endforeach;

    //MANDAR LA RESPUESTA DEL TEXTO JSON

	echo json_encode($row);
?>
