<?
	$Codigo = $_POST['CodigoProducto'];
	$Cantidad = $_POST['CantidadEntrada'];

	$model = new Notifications();
	$model->AumentarInventario($Codigo,$Cantidad);
?>