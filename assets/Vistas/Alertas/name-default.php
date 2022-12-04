<?php
	$model = new Existencias ();

	$matrizDeSalida = array(
        "aaData" => array () 
    );

	foreach ($model->ProductosAvencer('4') as $row):
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