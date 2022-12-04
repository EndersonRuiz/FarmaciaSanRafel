<?
	$model = new Autoproducos();

	echo json_encode($model->buscarCategorias ($_GET['keyword']));
		
?>