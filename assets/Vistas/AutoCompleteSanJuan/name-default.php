<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProductoSanJuan($_GET['keyword']));
		
?>