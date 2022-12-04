<?
	$model = new Autoproducos();

	echo json_encode($model->buscarProductoBodega($_GET['keyword']));
		
?>