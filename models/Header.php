<!DOCTYPE html>
<html lang="es">
<?
	//INCIAR O CONTINUAR LAS SESIONES

	session_start();

	//VARIBALES IGUAL AL VALOR DE LAS SESIONES EXISTENTES

    $Sucursal = $_SESSION['SanJuan'];
    $Sucursal1 = $_SESSION['Admin'];
    $Sucursa = $_SESSION['SanRafael'];
    $Sucurs = $_SESSION['SanRafael1'];
    $Sucurs1 = $_SESSION['Clinica'];
	$Puesto = $_SESSION['PuestoUsuario'];
	$NameUser = $_SESSION['NombreUsuario'];
	$NameComplete = $_SESSION['NameComplete'];
	$pass = $_SESSION['CodigoUs'];

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmacia San Rafael</title>
	<script src="bostrap/js/jquery.min.js"></script>
	<link rel="stylesheet" href="bostrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bostrap/font-awesome/css/font-awesome.min.css">
	<script src="bostrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="shortcut icon" href="assets/img/logo.png">
	<link rel="stylesheet" href="css/jquery.dataTables.css"></script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="js/jquery.mockjax.js"></script>
	<script src="js/jquery.autocomplete.js"></script>
	<script src="code/highcharts.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/chosen.css">
	<script  src="js/jquery-ui.js"></script>
	<script  src="js/chosen.jquery.min.js"></script>
	<script src="js/gofrendi.chosen.ajaxify.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/highcharts-3d.js"></script>
	<script src="js/exporting.js"></script>
	<script src="js/export-data.js"></script>
	<script src="js/accessibility.js"></script>
	<!-- Alertity -->
    <link rel="stylesheet" href="css/alertify.min.css" />
	<link rel="stylesheet" href="default.min.css" id="toggleCSS" />
    <script src="js/alertify.min.js"></script>
</head>';

<body>
	<!-- navBar -->
	<div class="full-width navBar" style="background-color: #07568D">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			
			<nav class="navBar-options-list">
				<ul class="list-unstyle">

					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications" onclick="Notificar()"></i>
						<div class="mdl-tooltip" for="notifications" id="DivCarga">Notificaciones</div>
					</li>

					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir del Sistema</div>
					</li>
					<?
				//INSTANCIAR LA CLASE EMPLEADOS
				$model = new Empleados ();
                //MANDAR CODIGO OBTENIDO
			    $model->setCodigo ($pass);
			    //OBTENER LOS DATOS EN BASE AL CODIGO ENVIADO
				$model->Obtener(); 
				?>
					
					<li class="text-condensedLight noLink" ><small><?echo "Usuario ".$NameUser." en linea";?></small></li>
					<li class="noLink">
						<figure>
							<?php 
							$idp = $model->getCodigo ();
							$path = "assets/FotosEmpleados/".$model->getCodigo();
							if(file_exists($path)){
								$directorio = opendir($path);
								while ($archivo = readdir($directorio))
								{
									if (!is_dir($archivo)){
							
										echo "<img src='assets/FotosEmpleados/$idp/$archivo' alt='Avatar' class='img-responsive'/>";

									}
								}
							}

							
				       	?>
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>

	<script type="text/javascript">
		
		function Notificar ()
		{
			window.location='index.php?view=Notificaciones'; 
		}
	</script>




	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body" style="background-color: #02363D">
			<div class="full-width navLateral-body-logo text-center tittles" style="background-color: #07568D">
				<i class="zmdi zmdi-close btn-menu"></i>Farmacia San Rafael 
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<?php 
							$idp = $model->getCodigo ();
							$path = "assets/FotosEmpleados/".$model->getCodigo();
							if(file_exists($path)){
								$directorio = opendir($path);
								while ($archivo = readdir($directorio))
								{
									if (!is_dir($archivo)){
							
										echo "<img src='assets/FotosEmpleados/$idp/$archivo' alt='Avatar' class='img-responsive'/>";

									}
								}
							}

							
					?>
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<FONT COLOR="White"><span>
						<?echo $NameComplete; ?><br>
						<small><? echo $Puesto;?></small>
					    </span>
				   </FONT>
					
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu" style="background-color: #07568D">
				<FONT COLOR="White">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; Control</span>
			    </FONT>
			</div>

			<?
				if($Puesto == 'Dependiente' and $Sucursal == 'SanJuan')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width" >
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>

								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								

								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
											<a href="index.php?view=FarmaciaSanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">SALIDAS/CLIENTES</FONT>
												</div>
											</a>
										</li>
								<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventarioGeneral1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO GENERAL</FONT>
												</div>
											</a>
										</li>
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
											<a href="index.php?view=InventorySanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN JUAN</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodega" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodeguita" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGUITA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>
								    <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>
							</ul>
						</nav>
					';}
				}

				if($Puesto == 'Dependiente' and $Sucursa == 'SanRafael')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>					
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								

								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
											<a href="index.php?view=DrogStores" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">SALIDAS/CLIENTES</FONT>
												</div>
											</a>
										</li>
								<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventarioGeneral1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO GENERAL</FONT>
												</div>
											</a>
										</li>
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
											<a href="index.php?view=InventorySanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN JUAN</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodega" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodeguita" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGUITA</FONT>
												</div>
											</a>
										</li>


										<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>

								    <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>
							</ul>
						</nav>
					';}
				}


				if($Puesto == 'Dependiente' and $Sucurs == 'SanRafael1')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>
							<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								

								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
											<a href="index.php?view=SanRafael1" class="full-width">
												<div class="navLateral-body-cl">								
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">SALIDAS/CLIENTES</FONT>
												</div>
											</a>
										</li>
								<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventarioGeneral1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO GENERAL</FONT>
												</div>
											</a>
										</li>
								<li class="full-width divider-menu-h"></li>

								       <li class="full-width">
											<a href="index.php?view=InventorySanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">INVENTARIO SAN JUAN</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa1" class="full-width">
												<div class="navLateral-body-cl">													
												    <FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">										
												    <FONT COLOR="White">INVENTARIO SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodega" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodeguita" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGUITA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>

                                    <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>
							</ul>
						</nav>
					';}
				}



				if($Puesto == 'Caja' and $Sucurs == 'SanRafael1')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											 <FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>
							<li class="full-width divider-menu-h"></li>
								<li class="full-width">
											<a href="index.php?view=SistemaCajaFSR1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">Sistema Caja FSR1</FONT>
												</div>
											</a>
								</li>
							<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
							<li class="full-width divider-menu-h"></li>
                                
                                <li class="full-width">
									<a href="index.php?view=InventarioGeneral1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-briefcase"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>INVENTARIO GENERAL</span></FONT>
										</div>
									</a>
								</li>

						    <li class="full-width divider-menu-h"></li>


							    <li class="full-width">
									<a href="index.php?view=InventorySanRafa1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-briefcase""></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>INVENTARIO SAN RAFAEL #1</span></FONT>
										</div>
									</a>
								</li>

                            <li class="full-width divider-menu-h"></li>
							
								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>
                            <li class="full-width divider-menu-h"></li>
                            
                                <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>

							</ul>
						</nav>
					';}
				}



				if($Puesto == 'Caja' and $Sucurs == 'SanJuan')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
											<a href="index.php?view=SistemaCajaSJ" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">SISTEMA CAJA SAN JUAN</FONT>
												</div>
											</a>
								</li>
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								
								<li class="full-width">
									<a href="index.php?view=InventarioGeneral1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-briefcase"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>INVENTARIO GENERAL</span></FONT>
										</div>
									</a>
								</li>

						    <li class="full-width divider-menu-h"></li>


							    <li class="full-width">
									<a href="index.php?view=InventorySanJuan" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-briefcase""></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>INVENTARIO SAN JUAN</span></FONT>
										</div>
									</a>
								</li>

                            <li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>
                                <li class="full-width divider-menu-h"></li>
                                
                                    <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>

							</ul>
						</nav>
					';}
				}
                 

                 if($Puesto == 'Caja' and $Sucurs == 'SanRafael')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
											<a href="index.php?view=SistemaCajaSanRafael" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">SISTEMA CAJA SAN RAFAEL</FONT>
												</div>
											</a>
								</li>
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								
								    <li class="full-width">
									<a href="index.php?view=InventarioGeneral1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-briefcase"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>INVENTARIO GENERAL</span></FONT>
										</div>
									</a>
								</li>

						    <li class="full-width divider-menu-h"></li>


							    <li class="full-width">
									<a href="index.php?view=InventorySanRafa" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-briefcase""></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>INVENTARIO SAN RAFAEL</span></FONT>
										</div>
									</a>
								</li>

                            <li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>
                                <li class="full-width divider-menu-h"></li>
                                
                                    <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>

							</ul>
						</nav>
					';}
				}




				if($Puesto == 'Dependiente' and $Sucurs1 == 'Clinica')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>


								<li class="full-width">
											<a href="index.php?view=InventorySanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN JUAN</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodega" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodeguita" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGUITA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>
								
					                 <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>


							</ul>
						</nav>
					';}
				}




                

				if ($Puesto == 'Digitador')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>

								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-case"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">ADMINISTRACION</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
										<li class="full-width">
											<a href="index.php?view=Products" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">PRODUCTOS</FONT>
												</div>
											</a>
										</li>
								
										<li class="full-width">
											<a href="index.php?view=Categorys" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-truck"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">CATEGORIAS</FONT>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="index.php?view=Laboratories" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-card"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">LABORATORIOS</FONT>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="index.php?view=Locations" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-label"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">UBICACIONES</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>


								

								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">INVENTARIO</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
										<li class="full-width">
											<a href="index.php?view=InventarioGeneral1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO GENERAL</FONT>
												</div>
											</a>
										</li>
										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN JUAN</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodega" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodeguita" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO BODEGUITA</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>








								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">SALIDAS/CLIENTES</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">

										<li class="full-width">
											<a href="index.php?view=DrogStores" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">FARMACIA SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=SanRafael1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">FARMACIA SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=FarmaciaSanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">Farmacia San Juan</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>
							
                                 <li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White">COMPRAS SAN RAFAEL</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="index.php?view=Purchases" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White"><span class="label label-danger">COMPRAS</span></FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=ComprasVistas" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White"><span class="label label-danger">CONSULTAS PRODUCTOS</span></FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="full-width divider-menu-h"></li>


								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Excel21" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>REPORTES</span></FONT>
										</div>
									</a>
								</li>


								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>


								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Bodega1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											<FONT COLOR="White"><span>PARA BODEGA</span></FONT>
										</div>
									</a>
								</li>

                                    <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>


								
							</ul>
						</nav>';
					}
				}
				if ($Puesto == 'Administrador' and $Sucursal1 == 'Admin')
				{
					if ($_SESSION['NombreUsuario'] != null)
					{
						echo '
						<nav class="full-width" style="background-color: #02363D">
							<ul class="full-width list-unstyle menu-principal">
								<li class="full-width">
									<a href="index.php?view=Menu" class="full-width">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-view-dashboard"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">INICIO</FONT>
										</div>
									</a>
								</li>

								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-case"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">ADMINISTRACION</FONT>
										</div>
										    <FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
										<li class="full-width">
											<a href="index.php?view=Products" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">PRODUCTOS</FONT>
												</div>
											</a>
										</li>
								
										<li class="full-width">
											<a href="index.php?view=Categorys" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="zmdi zmdi-truck"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">CATEGORIAS</FONT>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="index.php?view=Laboratories" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="zmdi zmdi-card"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">LABORATORIOS</FONT>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="index.php?view=Locations" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-label"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">UBICACIONES</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>

					

								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="zmdi zmdi-face"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											 <FONT COLOR="White">USUARIOS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
										<li class="full-width">
											<a href="index.php?view=Users" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="zmdi zmdi-account"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">REGISTROS DE USARIOS</FONT>
												</div>
											</a>
										</li>

									</ul>
								</li>





								

								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											 <FONT COLOR="White">INVENTARIO</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
										<li class="full-width">
											<a href="index.php?view=Inventory" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO GENERAL</FONT>
												</div>
											</a>
										</li>
										<li class="full-width divider-menu-h"></li>

										<li class="full-width">
											<a href="index.php?view=InventorySanJuan" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="fa fa-bank"></i></FONT>						
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN JUAN</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<FONT COLOR="White">INVENTARIO SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventorySanRafa1" class="full-width">
												<div class="navLateral-body-cl">												
													<FONT COLOR="White"><i class="fa fa-bank"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">INVENTARIO SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodega" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">INVENTARIO BODEGA</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=InventoryBodeguita" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-briefcase"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">INVENTARIO BODEGUITA</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>








								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											 <FONT COLOR="White">SALIDAS/CLIENTES</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">

										<li class="full-width">
											<a href="index.php?view=DrogStores" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">FARMACIA SAN RAFAEL</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=SanRafael1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">FARMACIA SAN RAFAEL #1</FONT>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=FarmaciaSanJuan" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-desktop-mac"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">FARMACIA SAN JUAN</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>
						


                                <li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">COMPRAS SAN RAFAEL</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="index.php?view=Purchases" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">COMPRAS</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="index.php?view=ComprasVistas" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">CONSULTAS PRODUCTOS</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="index.php?view=Purchases1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">CONSULTAR FACTURAS</span>
												</div>
											</a>
										</li>
									</ul>
								</li>





								<li class="full-width divider-menu-h"></li>


								<li class="full-width">
									<a href="index.php?view=InOut" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i class="fa fa-upload"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White"><span>SALIDAS/SUCURSALES</span></FONT>
										</div>
									</a>
								</li>
								
								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports" class="full-width">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White"><span>REPORTES</span></FONT>
										</div>
									</a>
								</li>

								<li class="full-width divider-menu-h"></li>

								<li class="full-width">
									<a href="index.php?view=Reports1" class="full-width">
										<div class="navLateral-body-cl">
											<FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White"><span>RPS ENTRADAS</span></FONT>
										</div>
									</a>
								</li>


								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="index.php?view=Bodega1" class="full-width">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i  class="fa fa-pie-chart"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White"><span>PARA BODEGA</span></FONT>
										</div>
									</a>
								</li>


								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-case"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">SISTEMA CAJA</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
										
										<li class="full-width">
											<a href="index.php?view=SistemaCajaFSR1" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="fa fa-cubes"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">SISTEMA CAJA FSR1</FONT>
												</div>
											</a>
										</li>
								
										<li class="full-width">
											<a href="index.php?view=SistemaCajaSJ" class="full-width">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-truck"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">SISTEMA CAJA SAN JUAN</FONT>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="index.php?view=SistemaCajaSanRafael" class="full-width">
												<div class="navLateral-body-cl">
												    <FONT COLOR="White"><i class="zmdi zmdi-card"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
												    <FONT COLOR="White">SISTEMA CAJA SAN RAFAEL</FONT>
												</div>
											</a>
										</li>
									</ul>
								</li>



                               <li class="full-width divider-menu-h"></li>



                                  <li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										    <FONT COLOR="White"><i class="zmdi zmdi-store"></i></FONT>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
										    <FONT COLOR="White">REPORTES FARMACIAS</FONT>
										</div>
										<FONT COLOR="White"><span class="zmdi zmdi-chevron-left"></span></FONT>
									</a>
									<ul class="full-width menu-principal sub-menu-options" style="background-color: #07568D">
                                             
                                        <li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm421148" >
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS POR RANGO</span>
												</div>
											</a>
										</li>

										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211481">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">FECHAS MENOR A</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm4211482">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS IGUAL 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114822">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">EXISTENCIAS MAYOR A 0</span>
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width" data-toggle="modal" data-target="#modalContactForm42114821">
												<div class="navLateral-body-cl">
													<FONT COLOR="White"><i class="zmdi zmdi-widgets"></i></FONT>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													<span class="label label-danger">PRODUCTOS POR UBICACION</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>



							</ul>
						</nav>';
					}
				}
			?>

		</div>

	</section>
	
	<div class="modal fade" id="modalContactForm421148" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>REPORTE POR RANGO DE FECHAS</h4>
            </div>
             <form action="prueva/ReporteFecha1/" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    	<div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="ReporteFecha5" id="ReporteFecha5" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

						<div class="col-md-4">
							    <div>
								Fecha de Reporte Inicio:
								<input type="date" name="ReporteFecha3" id="ReporteFecha3" class="form-control">
							    </div>
						</div>  

						<div class="col-md-4">
							    <div>
								Fecha de Reporte Fin:
								<input type="date" name="ReporteFecha4" id="ReporteFecha4" class="form-control">
							    </div>
						</div>

			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="submit" class="btn btn-sm btn-primary">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                    </form>
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>




    <div class="modal fade" id="modalContactForm4211481" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>REPORTE FECHAS MENOR A</h4>
            </div>
             <form action="prueva/ReporteFecha/" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    	<div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="ReporteFecha1" id="ReporteFecha1" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

						<div class="col-md-4">
							    <div>
								Fecha de Reporte:
								<input type="date" name="ReporteFecha2" id="ReporteFecha2" class="form-control">
							    </div>
						</div>  


			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="submit" class="btn btn-sm btn-primary">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                    </form>
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>




     <div class="modal fade" id="modalContactForm4211482" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>Consulta de Productos en Cero</h4>
            </div>
             <form action="prueva/ReporteCero/" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    	<div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="ReporteCero" id="ReporteCero" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="submit" class="btn btn-sm btn-primary">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                    </form>
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>



     <div class="modal fade" id="modalContactForm42114821" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>Productos por Ubicacion</h4>
            </div>
             <form action="prueva/ReporteEstante/" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                        <div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="ReporteEstante1" id="ReporteEstante1" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>


                    	<div class="col-md-4">
                              <div>
							   Estante:
                               <select name="ReporteEstante" id="ReporteEstante" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listarrw() as $r): 
                                ?>
                                 <option value="<?php echo $r->Nombre;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="submit" class="btn btn-sm btn-primary">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                    </form>
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>



     <div class="modal fade" id="modalContactForm42114822" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>EXISTENCIAS MAYOR A 0</h4>
            </div>
             <form action="prueva/ReporteCero1/" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    	<div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="ReporteCero1" id="ReporteCero1" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="submit" class="btn btn-sm btn-primary">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                    </form>
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>
</body>