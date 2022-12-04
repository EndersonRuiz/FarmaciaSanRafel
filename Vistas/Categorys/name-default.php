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
					Este es el modulo de registro de las categoriad donde usted puede registrar una nueva categoria o darle de baja, modifacar los datos registrados. 
				</p>
			</div>
		</section>

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nuevo Registro</a>
				<a href="#tabListAdmin" class="mdl-tabs__tab">Ver Registros</a>
			</div>
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nueva Categoria
							</div>
							<div class="full-width panel-content">
								<form action="index.php?view=AddCategory" method="post" autocomplete="off">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos de la Categoria</h5>
				
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nombre" name="Nombre" required="">
												<label class="mdl-textfield__label" for="NameAdmin">Nombre</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  name="Medida" required="">
												<label class="mdl-textfield__label" for="LastNameAdmin">Medida</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Descripcion" name="Descripcion" required="">
												<label class="mdl-textfield__label">Descripcion</label>
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


			<div class="mdl-tabs__panel" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Listado de Categorias
							</div>
                            <div class="full-width divider-menu-h"></div>
							<div class="row table-responsive">
								<table class="table table-bordered table-hover display" class="table table-striped" id="TableCategorys">
									<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
										<tr>
											<th style="width: 50px;"><center>Id</center></th>
											<th><center>Nombre</center></th>
											<th><center>Medida</center></th>
											<th><center>Descripcion</center></th>
											<th style="width: 50px;"><center>Modificar</center></th>
											<th style="width: 50px;"><center>Eliminar</center></th>
										</tr>
									</thead>
									<tbody>
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS

								        $model = new Categorias();

								        //CARGAR LOS CAMPOS A LA VARIABLE $r

								        foreach($model->Listar_1($_POST['Buscar']) as $r): 
									?>
										<tr>
											<td><center><?php echo $r->Codigo;?></center></font></td>
											<td><center><?php echo $r->Nombre;?></center></td>
											<td><center><?php echo $r->Medida;?></center></td>
											<td><center><?php echo $r->Descripcion;?></center></td>
											<td>
											<center>
												<a href="index.php?view=EditCategory&Codigo=<?echo $r->Codigo;?>"><span class="glyphicon glyphicon-pencil"></span></a>
											</center>
											</td>
											<td>
												<center>
													<a href="index.php?view=DeleteCategory&Codigo=<?echo $r->Codigo;?>" onclick="javascript:return confirm('DESEA ELIMINAR ESTE REGISTRO..!');"><span class="glyphicon glyphicon-trash"></span></a>
												</center>
											</td>
											
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
		</div>
	</section>

	
	<script type="text/javascript">
		 $(document).ready(function(){
				$('#TableCategorys').DataTable({
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