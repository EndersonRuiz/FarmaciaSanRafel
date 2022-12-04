<?
	$model = new Autoproducos();

	echo json_encode($model->buscarComprasPorNumFac ($_GET['keyword']));
		
?>