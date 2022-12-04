<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProductoComprar ($_GET['keyword']));
		
?>