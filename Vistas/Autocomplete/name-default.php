<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProducto ($_GET['keyword']));
		
?>