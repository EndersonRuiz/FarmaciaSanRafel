<?php
	$model = new Existencias ();

	$matrizDeSalida = array(
        "aaData" => array () 
    );
    $producto1 = $_POST['ProductoVenta'];
	foreach ($model->ProductosAvencer($producto1) as $row):
		$matrizDeSalida['aaData'][] = $row;
	endforeach;

	foreach($matrizDeSalida as $producto => $detalles)
	{	 
	    foreach($detalles as $indice => $valor)
		{
			echo "<p><b><h5>". $valor->Codigo."  ".$valor->NombreProducto." <font color='red'>".$valor->FechaVencimiento."</font> (".$valor->Nombre." ".$valor->Seccion.")</h5></b></p>";
		}
	}
?>