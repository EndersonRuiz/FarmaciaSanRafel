
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de Usuarios</title>
	<link rel="stylesheet" href="bostrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bostrap/font-awesome/css/font-awesome.min.css">
    <script src="bostrap/js/jquery.min.js"></script>
    <script src="bostrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications"></i>
						<div class="mdl-tooltip" for="notifications">Notificaciones</div>
					</li>

					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir del Sistema</div>
					</li>
					
					<li class="text-condensedLight noLink" ><small>Nombre Usuario</small></li>
					<li class="noLink">
						<figure>
							<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i>Farmacia San Rafael 
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						Nombre Completo Admin<br>
						<small>Puesto que Tiene</small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; Control</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="index.php?view=Menu" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								ADMINISTRACION
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							
							<li class="full-width">
								<a href="index.php?view=Categorys" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										CATEGORIAS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="index.php?view=Laboratories" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										LABORATORIOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="index.php?view=Categorys" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-label"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										UBICACIONES
									</div>
								</a>
							</li>
						</ul>
					</li>

					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="index.php?view=Users" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										REGISTROS DE USARIOS
									</div>
								</a>
							</li>

						</ul>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="index.php?view=Products" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								PRODUCTOS
							</div>
						</a>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="sales.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								COMPRAS
							</div>
						</a>
					</li>

					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								FARMACIAS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">

							<li class="full-width">
								<a href="admin.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-desktop-mac"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FARMACIA#1
									</div>
								</a>
							</li>

							<li class="full-width">
								<a href="admin.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-desktop-mac"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FARMACIA#2
									</div>
								</a>
							</li>

							<li class="full-width">
								<a href="admin.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-desktop-mac"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FARMACIA#3
									</div>
								</a>
							</li>

						</ul>
					</li>
					


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="inventory.html" class="full-width">
							<div class="navLateral-body-cl">
								<i  ></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								REPORTES
							</div>
						</a>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								MANUAL DE USUARIO
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										VER MANUAL
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PLUSS
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>

	</section>

     <!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Este es el modulo de registro de los empleados donde usted puede registrar un nuevo emplado o darle de baja, modifacar los datos de un empleado registrado. 
				</p>
			</div>
		</section>

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabListAdmin" class="mdl-tabs__tab is-active">Registros</a>
				<a href="#tabNewAdmin" class="mdl-tabs__tab">Nuevo Registro</a>
			</div>

			<div class="mdl-tabs__panel is-active" id="tabListAdmin">
						<div class="mdl-grid">
							<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
								<div class="full-width panel mdl-shadow--2dp">
									<div class="full-width panel-tittle bg-success text-center tittles">
										Listado de Usuarios
									</div>
									<div class="full-width panel-content">
										<form action="index.php?view=Users" method="post">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
												<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
													<i class="zmdi zmdi-search"></i>
												</label>

												<div class="mdl-textfield__expandable-holder">
													<input class="mdl-textfield__input" type="text" id="searchAdmin" name="Buscar">
													<label class="mdl-textfield__label"></label>
												</div>

												<div class="mdl-textfield__expandable-holder">
													<select name="Elejido">
														<option>Codigo</option>
														<option>Nombre</option>
													</select>
													<label class="mdl-textfield__label"></label>
												</div>
											</div>
										</form>



		                            <div class="full-width divider-menu-h"></div>
						<div class="row table-responsive">
							<table class="table table-bordered table-hover" class="table table-striped">
								<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
									<tr>
										<th>Id</th>
										<th>Nombre#1</th>
										<th>Nombre#2</th>
										<th>Apellido#1</th>
										<th>Apellido#2</th>
										<th>Puesto</th>
										<th>Usuario</th>
										<th>ContraseÃ±a</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS

								        $model = new Empleados ();

								        //CARGAR LOS CAMPOS A LA VARIABLE $r

								        foreach($model->Listar($_POST['Buscar']) as $r): 
								    ?>
						            <tr>
						             <td><?php echo $r->Codigo; ?></td>
						                <td><?php echo $r->PrimerNombre; ?></td>
						                <td><?php echo $r->SegundoNombre; ?></td>
						                <td><?php echo $r->PrimerApellido; ?></td>
						                <td><?php echo $r->SegundoApellido; ?></td>
						                <td><?php echo $r->Puesto; ?></td>
						                <td><?php echo $r->Usuario; ?></td>
						                <td><?php echo $r->ContraseÃ±a; ?></td>
						            
						                <td><a href="index.php?view=EditUsers&Codigo=<?echo $r->Codigo;?>"> <span class="glyphicon glyphicon-pencil"></span></a></td>
										<td><a href="index.php?view=DeleteEmploy&Codigo=<?echo $r->Codigo;?>" onclick="javascript:return confirm('DESEA ELIMINAR ESTE REGISTRO..!');"><span class="glyphicon glyphicon-trash"></span></button></td>
						            </tr>

						        	<?php endforeach; //FIN PHP PRINCIPAL ?> 					
								</tbody>
							</table>
						</div>
							</div>
						</div>
			</div>
			
			</div>
			</div>
			<!--clase donde se Registra al Usuario-->
				<div class="mdl-tabs__panel" id="tabNewAdmin">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
							<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
									Nuevo Usuario
								</div>
								<div class="full-width panel-content">
									<form action="index.php?view=AddEmploy" method="post" enctype="multipart/form-data" autocomplete="off">
										<div class="mdl-grid">
											<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
												<h5 class="text-condensedLight">Datos del Usuario</h5>
												
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš ]*(\.[0-9]+)?" required="" id="PrimerNombre" name="PrimerNombre">
													<label class="mdl-textfield__label" for="NameAdmin">PrimerNombre</label>
												</div>
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš ]*(\.[0-9]+)?" id="SegundoNombre" required="" name="SegundoNombre">
													<label class="mdl-textfield__label" for="LastNameAdmin">Sengundo Nombre</label>
												</div>

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" required="" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš ]*(\.[0-9]+)?" id="PrimerApellido" name="PrimerApellido">
													<label class="mdl-textfield__label">PrimerApellido</label>
												</div>

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" required="" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš ]*(\.[0-9]+)?" id="SegundoApellido" name="SegundoApellido">
													<label class="mdl-textfield__label">SegundoApellido</label>
												</div>


												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš ]*(\.[0-9]+)?" id="Usuario" name="Usuario" required="">
													<label class="mdl-textfield__label">Usuario</label>
												</div>

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="password" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš ]*(\.[0-9]+)?" id="ContraseÃ±a" name="Contrasena" required="">
													<label class="mdl-textfield__label" >ContraseÃ±a</label>
												</div>

											</div>





											<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
												<h5 class="text-condensedLight">Mas Detalles</h5>

												
												<h5 class="text-condensedLight">Puesto</h5>

												<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
													<input type="radio" id="option-1" class="mdl-radio__button" name="Puesto" value="Administrador" name="Puesto" id="Puesto" checked="checked">
													<img src="assets/img/avatar-male.png" alt="avatar" style="height: 45px; width:45px;">
													<span class="mdl-radio__label">Administrador</span>
												</label>

												<br><br>
												<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
													<input type="radio" id="option-2" class="mdl-radio__button" name="Puesto" value="Dependiente">
													<img src="assets/img/avatar-female.png" alt="avatar" style="height: 45px; width:45px;">
													<span class="mdl-radio__label">Dependiente</span>
												</label>


												<br><br>
												<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
													<input type="radio" id="option-3" class="mdl-radio__button" name="Puesto" value="Digitador">
													<img src="assets/img/avatar-male2.png" alt="avatar" style="height: 45px; width:45px;">
													<span class="mdl-radio__label">Digitador</span>
												</label>

												<hr></hr>
												<center><h5 class="text-condensedLight">Foto</h5></center>


												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<label class="mdl-textfield__label">Foto</label>
													<br></br>
													<input class="mdl-textfield__input" type="file" id="Fotos" name="archivo" accept="image/*">
													
												</div>


											</div>

										</div>


										<p class="text-center">
											<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
												<i class="zmdi zmdi-plus"></i>
											</button>
											<div class="mdl-tooltip" for="btn-addAdmin">Guardar</div>
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>

	<script type="text/javascript">
            
	</script>
</body>
</html>