<?
	require_once '../db/ClaseConexion.php';

	$ejecuta = new ClaseConexion ();
	$ejecuta->CrearConexion ();
	$ejecuta->CerrarConexion ();
?>