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
					Este modulo usted puede modificar a una Categoria... 
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
								Nueva Categoria
							</div>
							<div class="full-width panel-content">
							<?
							  		//INSTANCIAR LA CLASE EMPLEADOS
							        $model = new Categorias ();

							        //MANDAR CODIGO OBTENIDO

							        $model->setCodigo ($_REQUEST['Codigo']);

							        //OBTENER LOS DATOS EN BASE AL CODIGO ENVIADO

							        $model->Obtener(); 
							?>
								<form action="index.php?view=UpdateCategory" method="POST">
									<div class="mdl-grid">

										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos de la Categoria</h5>
											
											<div class="mdl-textfield__expandable-holder">
												<input value="<? echo $model->getCodigo(); ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo">
												<label class="mdl-textfield__label" for="DNIAdmin">Codigo</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nombre" name="Nombre" required="" value="<? echo $model->getNombre(); ?>">
												<label class="mdl-textfield__label" for="NameAdmin">Nombre</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $model->getMedida(); ?>" class="mdl-textfield__input" type="text"  name="Medida" required="">
												<label class="mdl-textfield__label" for="LastNameAdmin">Medida</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $model->getDescripcion(); ?>" class="mdl-textfield__input" type="text"  id="Descripcion" name="Descripcion" required="">
												<label class="mdl-textfield__label">Descripcion</label>
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
</body>
</html>