<?php 	
	
	//INSTANCIA DE LA CLASE PRODUCTOS

	$model = new Inventario ();

	//RECIBIR EL ID DE FILA ELEGIDA POR EL METODO POST

	$productId = $_POST['productId'];

	//DECLARAR VARIABLE QUE ALMACENARA EL NOMBRE DE LA IMAGEN

	$imagen;

	//DIRECTORIO EN DONDE SE ENCUENTRA LA IMAGEN MAS EL NUMERO DE CARPETA EN VASE A LA FILA ELEGIDA

	//MANDAR LOS DATOS DEL RESULSET A UN OBJECT

	foreach ($model->ObtenerDatosModalProducto($productId) as $row):
	endforeach;

	$IdImage = $row->CodigoProducto;

	$path = "assets/FotosProductos/".$IdImage;

	$idp = $IdImage;

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

	//AÑADIR EL ITEM IMAGEN

    $row->imagen = $imagen;
    $row->Desc1 = array_column($model->ObtenerDescuentosModal($IdImage),'caption')[0];
    $row->Desc2 = array_column($model->ObtenerDescuentosModal($IdImage),'caption')[1];
    $row->Desc3 = array_column($model->ObtenerDescuentosModal($IdImage),'caption')[2];
    $row->Desc4 = array_column($model->ObtenerDescuentosModal($IdImage),'caption')[3];
    $row->Desc5 = array_column($model->ObtenerDescuentosModal($IdImage),'caption')[4];
    $row->Desc6 = array_column($model->ObtenerDescuentosModal($IdImage),'caption')[5];

    //MANDAR LA RESPUESTA DEL TEXTO JSON

	echo json_encode($row);
?>
