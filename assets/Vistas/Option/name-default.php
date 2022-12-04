<?

	//EMPLEADOS

	if ($_REQUEST['Codigo'] == 1)
	{
		print '<script>window.location = "index.php?view=IndexUsuarios";</script>';
	}
	if ($_REQUEST['Codigo'] == 900)
	{
		print '<script>window.location = "index.php?view=SistemaCajaReporte";</script>';
	}
	if ($_REQUEST['Codigo'] == 901)
	{
		print '<script>window.location = "index.php?view=SistemaCajaReporte2";</script>';
	}
	if ($_REQUEST['Codigo'] == 2)
	{
		print '<script>window.location = "index.php?view=ReportePorMes";</script>';
	}

	//EMPLEADOS

	if ($_REQUEST['Codigo'] == 19)
	{
		print '<script>window.location = "index.php?view=Excel1";</script>';
	}
	if ($_REQUEST['Codigo'] == 21)
	{
		print '<script>window.location = "index.php?view=Excel3";</script>';
	}
	if ($_REQUEST['Codigo'] == 23)
	{
		print '<script>window.location = "index.php?view=Excel6";</script>';
	}
	if ($_REQUEST['Codigo'] == 24)
	{
		print '<script>window.location = "index.php?view=Excel7";</script>';
	}
	if ($_REQUEST['Codigo'] == 25)
	{
		print '<script>window.location = "index.php?view=Excel8";</script>';
	}
	if ($_REQUEST['Codigo'] == 26)
	{
		print '<script>window.location = "index.php?view=Excel9";</script>';
	}
	if ($_REQUEST['Codigo'] == 27)
	{
		print '<script>window.location = "index.php?view=Excel10";</script>';
	}


	//SALIDAS A LAS SUCURSALES

	if ($_REQUEST['Codigo'] == 31)
	{
		print '<script>window.location = "index.php?view=Excel21";</script>';
	}
	if ($_REQUEST['Codigo'] == 32)
	{
		print '<script>window.location = "index.php?view=Excel31";</script>';
	}
	if ($_REQUEST['Codigo'] == 58)
	{
		print '<script>window.location = "index.php?view=Excel58";</script>';
	}
	if ($_REQUEST['Codigo'] == 59)
	{
		print '<script>window.location = "index.php?view=Excel60";</script>';
	}
	if ($_REQUEST['Codigo'] == 60)
	{
		print '<script>window.location = "index.php?view=Excel61";</script>';
	}
	if ($_REQUEST['Codigo'] == 90) {
		print '<script>window.location = "index.php?view=ReportePastel";</script>';
	}
	if ($_REQUEST['Codigo'] == 91) {
		print '<script>window.location = "index.php?view=ReporteGraficos";</script>';
	}
	if ($_REQUEST['Codigo'] == 92) {
		print '<script>window.location = "index.php?view=ReporteGraficos1";</script>';
	}
	if($_REQUEST['Codigo'] == 94){
		print '<script>window.location = "index.php?view=RastrearVenta"</script>';
	}
	if($_REQUEST['Codigo'] == 95){
		print '<script>window.location = "index.php?view=RastrearSalidas"</script>';
	}

?>