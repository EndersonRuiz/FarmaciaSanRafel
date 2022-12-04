<?
    if(isset($_POST['Codigo']))
    {
		$model = new Kardex();
		$Valor = $_POST['Codigo'];

		$model->AnularSalida ($Valor);

		echo json_encode('success');
	}

	/*print "<script>
	window.location='index.php?view=DrogStores'; 
	</script>";*/
?>