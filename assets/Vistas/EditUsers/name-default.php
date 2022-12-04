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
					En este modulo usted puede modificar a un Usuario... 
				</p>
			</div>
		</section>

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Actualizar Usuario
							</div>
							<div class="full-width panel-content">
								
								<?
							  		//INSTANCIAR LA CLASE EMPLEADOS
							        $model = new Empleados ();

							        //MANDAR CODIGO OBTENIDO

							        $model->setCodigo ($_REQUEST['Codigo']);

							        //OBTENER LOS DATOS EN BASE AL CODIGO ENVIADO

							        $model->Obtener(); 
							    ?>
							    
							    <form action="index.php?view=UpdateEmploy" method="POST" enctype="multipart/form-data" autocomplete="off">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del Usuario</h5>
											
											<div class="mdl-textfield__expandable-holder">
												<input value="<? echo $model->getCodigo(); ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo">
												<label class="mdl-textfield__label" for="DNIAdmin">Codigo</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóú?É?ÓÚ ]*(\.[0-9]+)?" id="PrimerNombre" name="PrimerNombre" value="<? echo $model->getPrimerNombre();?>">
												<label class="mdl-textfield__label" for="NameAdmin">PrimerNombre</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóú?É?ÓÚ ]*(\.[0-9]+)?" id="SegundoNombre" name="SegundoNombre" value="<? echo $model->getSegundoNombre();?>">
												<label class="mdl-textfield__label" for="LastNameAdmin">Sengundo Nombre</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóú?É?ÓÚ ]*(\.[0-9]+)?" id="PrimerApellido" name="PrimerApellido" value="<? echo $model->getPrimerApellido();?>">
												<label class="mdl-textfield__label">PrimerApellido</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóú?É?ÓÚ ]*(\.[0-9]+)?" id="SegundoApellido" name="SegundoApellido" value="<? echo $model->getSegundoApellido ();?>">
												<label class="mdl-textfield__label">SegundoApellido</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóú?É?ÓÚ ]*(\.[0-9]+)?" id="Usuario" name="Usuario" value="<? echo $model->getUsuario ();?>">
												<label class="mdl-textfield__label">Usuario</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<? echo $model->getPassword ();?>" type="text" id="Contraseña" name="Contraseña">
												<label class="mdl-textfield__label">Contraseña</label>
											</div>
										</div>

										<?
											$Data = $model->getPuesto ();

										?>

									
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Mas Detalles</h5>

											<h5 class="text-condensedLight">Puesto</h5>
									
											<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
												<input name="Puesto" type="radio" id="option-1" class="mdl-radio__button" value="Administrador" <? if ($Data == 'Administrador'): ?> checked="checked" <? endif ?> >
												<img src="assets/img/avatar-male.png" alt="avatar" style="height: 45px; width:45px;">
												<span class="mdl-radio__label">Administrador</span>
											</label>


											<br><br>
											<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
												<input type="radio" name="Puesto" id="option-2" class="mdl-radio__button"  value="Dependiente" <? if ($Data == 'Dependiente'): ?> checked="checked" <? endif ?>>
												<img src="assets/img/avatar-female.png" alt="avatar" style="height: 45px; width:45px;">
												<span class="mdl-radio__label">Dependiente</span>
											</label>


											<br><br>
											<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
												<input type="radio" name="Puesto" id="option-3" class="mdl-radio__button" value="Digitador" <? if ($Data == 'Digitador'): ?> checked="checked" <? endif ?>>
												<img src="assets/img/avatar-male2.png" alt="avatar" style="height: 45px; width:45px;">
												<span class="mdl-radio__label">Digitador</span>
											</label>

											<br><br>
											<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
												<input type="radio" name="Puesto" id="option-4" class="mdl-radio__button" value="Caja" <? if ($Data == 'Digitador'): ?> checked="checked" <? endif ?>>
												<img src="assets/img/avatar-male2.png" alt="avatar" style="height: 45px; width:45px;">
												<span class="mdl-radio__label">Cajero</span>
											</label>

											<hr></hr>

											<center><h5 class="text-condensedLight">Foto</h5></center>

				<div class="col-5">
					<label for="archivo" class="col-sm-5 control-label">Foto o Imagen</label>
					<div >
						
						<?php 
							$idp = $model->getCodigo ();
							$path = "assets/FotosEmpleados/".$model->getCodigo();
							if(file_exists($path)){
								$directorio = opendir($path);
								while ($archivo = readdir($directorio))
								{
									if (!is_dir($archivo)){
							
										echo "<img  src='assets/FotosEmpleados/$idp/$archivo' width='300' height='150' />";

										echo "<div data='".$path."/".$archivo."' ><a class='btn btn-success' href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><center><span class='glyphicon glyphicon-picture'> MOSTRAR FOTO EN TAMAÑO ORIGINAL </span></center></a>";
									}
								}
							}

							
						?>
						
						<br></br>
						<input type='file' class='form-control' id='archivo' name='archivo' value='".$archivo."'>
						
					</div>
				</div>

										</div>
									</div>


									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
											<i class="glyphicon glyphicon-pencil"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addAdmin">Modificar</div>
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
        $(document).ready(function() {
				$('.delete').click(function(){
					var parent = $(this).parent().attr('Codigo');
					var service = $(this).parent().attr('data');
					var dataString = 'Codigo='+service;
					
					$.ajax({
						type: "POST",
						url: "index.php?view=EliminarFotou",
						data: dataString,
						success: function() {			
							location.reload();
						}
					});
				});                 
			});   
	</script>
</body>
</html>