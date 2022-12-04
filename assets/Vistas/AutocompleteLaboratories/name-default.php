<?
	$model = new Autoproducos();

	echo json_encode($model->buscarLaboratorios ($_GET['keyword']));
		
?>