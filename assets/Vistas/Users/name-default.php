<?
	session_start();
	if ($_SESSION['NombreUsuario'] == '') 
	{
		print "<script>
		window.location='index.php?view=Loguin'; 
		</script>";
	}
	else
	{
		require_once 'models/Header.php';
	}
?>

<body>
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
										



		                            <div class="full-width divider-menu-h"></div>
						<div class="row table-responsive">
							<table class="display" id="TableUsers" class="table table-striped">
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
						                <td><?php echo "*********";?></td>
						            
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
													<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?ÃÃ?ÃÃ ]*(\.[0-9]+)?" required="" id="PrimerNombre" name="PrimerNombre">
													<label class="mdl-textfield__label" for="NameAdmin">PrimerNombre</label>
												</div>
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?ÃÃ?ÃÃ ]*(\.[0-9]+)?" id="SegundoNombre" required="" name="SegundoNombre">
													<label class="mdl-textfield__label" for="LastNameAdmin">Sengundo Nombre</label>
												</div>

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" required="" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?ÃÃ?ÃÃ ]*(\.[0-9]+)?" id="PrimerApellido" name="PrimerApellido">
													<label class="mdl-textfield__label">PrimerApellido</label>
												</div>

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" required="" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?ÃÃ?ÃÃ ]*(\.[0-9]+)?" id="SegundoApellido" name="SegundoApellido">
													<label class="mdl-textfield__label">SegundoApellido</label>
												</div>


												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?ÃÃ?ÃÃ ]*(\.[0-9]+)?" id="Usuario" name="Usuario" required="">
													<label class="mdl-textfield__label">Usuario</label>
												</div>

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input class="mdl-textfield__input" type="password" id="ContraseÃ±a" name="Contrasena" required="">
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

												<br><br>
												<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
													<input type="radio" id="option-4" class="mdl-radio__button" name="Puesto" value="Caja">
													<img src="assets/img/avatar-male2.png" alt="avatar" style="height: 45px; width:45px;">
													<span class="mdl-radio__label">Cajero</span>
												</label>

												<hr></hr>
												<center><h5 class="text-condensedLight">Foto</h5></center>

											<br></br>

											<div class="form-group">
												<label for="archivo" class="col-sm-2 control-label">Imagen</label>
												<div class="col-sm-10">
													<input type="file" class="form-control" id="archivo" name="archivo">
												</div>
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
       $(document).ready(function(){
				$('#TableUsers').DataTable({
					"order": [[0, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					},
				});	
			});
	</script>
</body>
</html>