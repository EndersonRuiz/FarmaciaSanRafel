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
					Esta es una vista previa de los usuarios que trabajan para la Farmacia San Rafael... 
				</p>
			</div>
		</section>

			<div class="mdl-tabs__panel" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Listado de Usuarios
							</div>
							<div class="full-width panel-content">
								<form method="post" action="index.php?view=ViewUsers">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
											<i class="zmdi zmdi-search"></i>
										</label>

										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchAdmin" name="Buscar" value="">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>

								<?
									//INSTANCIAR LA CLASE EMPLEADOS

							        $model = new Empleados();

							        //CARGARLOS RESULTADOS A LA VARIABLE $r

							        foreach($model->ListarBusqueda($_POST['Buscar']) as $r): 
															   
								 ?>

								<div class="mdl-list">


									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-account mdl-list__item-avatar"></i>
											<span><? echo $r->PrimerNombre." ".$r->SegundoNombre." ".$r->PrimerApellido." ".$r->SegundoApellido; ?></span>
											<span class="mdl-list__item-sub-title">
												<?
													echo $r->Puesto;
												?>

											</span>
										</span>
										<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
									</div>
									<?php endforeach; 


									//FIN PHP PRINCIPAL ?> 	
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>