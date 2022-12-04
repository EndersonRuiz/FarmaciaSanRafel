<?php 	
	
	//INSTANCIA DE LA CLASE PRODUCTOS

	$model = new Productos ();

	//RECIBIR EL ID DE FILA ELEGIDA POR EL METODO POST

	$productId = $_POST['productId'];

	//DECLARAR VARIABLE QUE ALMACENARA EL NOMBRE DE LA IMAGEN

	$imagen;

	//VARABLE PARA OBTENER LA ID

	$idp = $productId;

	//DIRECTORIO EN DONDE SE ENCUENTRA LA IMAGEN MAS EL NUMERO DE CARPETA EN VASE A LA FILA ELEGIDA

	$path = "assets/FotosProductos/".$productId;

	//SI EXISTE RECORRER Y DEVOLVER EL NOMBRE DE EL ARCHIVO

	if(file_exists($path)){
		$directorio = opendir($path);
		while ($archivo = readdir($directorio))
		{
			if (!is_dir($archivo))
			{
				$imagen = "".$idp."/".$archivo;
			}
		}
	}

	//MANDAR LOS DATOS DEL RESULSET A UN OBJECT

	foreach ($model->ObtenerDatosModal($productId) as $row):
	endforeach;
    	
	//AÑADIR EL ITEM IMAGEN

    $row->imagen = $imagen;
    $row->Desc1 = array_column($model->ObtenerDescuentosModal($productId),'caption')[0];
    $row->Desc2 = array_column($model->ObtenerDescuentosModal($productId),'caption')[1];
    $row->Desc3 = array_column($model->ObtenerDescuentosModal($productId),'caption')[2];
    $row->Desc4 = array_column($model->ObtenerDescuentosModal($productId),'caption')[3];
    $row->Desc5 = array_column($model->ObtenerDescuentosModal($productId),'caption')[4];
    $row->Desc6 = array_column($model->ObtenerDescuentosModal($productId),'caption')[5];

    //MANDAR LA RESPUESTA DEL TEXTO JSON

	echo json_encode($row);
?>

