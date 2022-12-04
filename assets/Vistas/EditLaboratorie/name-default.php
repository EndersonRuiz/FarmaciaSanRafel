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
		

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Modificar un Laboratorio
							</div>
							<div class="full-width panel-content">
								<form action="index.php?view=UpdateLaboratorie" method="post">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del Laboratorio</h5>


											
											<div class="mdl-textfield__expandable-holder">
												<input value="<? echo ($_REQUEST['Codigo']); ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo">
												<label class="mdl-textfield__label" for="DNIAdmin">Codigo</label>
											</div>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<h5>Casa:</h5>
												<select name="CodigoCasa" class="mdl-textfield__input" required="">
												<?
													//INSTANCIA DE LA CLASE EMPLEADOS

											        $model = new CatalogoCasas();
											        $Ob = new Laboratorios ();
											    	$Ob->setCodigo ($_REQUEST['Codigo']);
											        $Ob->Obtener ();
											        $IdOb = $Ob->getCodigoCasa ();

											        //CARGAR LOS CAMPOS A LA VARIABLE $r

											        foreach($model->Listar() as $r): 
												?>
												    <option value="<?php echo $r->Codigo;?>"
												    <?
												    if ($IdOb == $r->Codigo)
												    {
												    	echo "selected";
												    }
												    ?>
												    >
												    	<?php echo $r->Nombre;?>
												    </option>
												    <?php endforeach; //FIN PHP PRINCIPAL ?>
												</select>
											</div>


											<!--menu elegir marcas -->

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<h5>Marca:</h5>
												<select name="CodigoMarca" class="mdl-textfield__input" required="">
												<?
													//INSTANCIA DE LA CLASE EMPLEADOS

											        $model_1 = new CatalogoMarcas();

											        //CARGAR LOS CAMPOS A LA VARIABLE $r

											        foreach($model_1->Listar() as $d): 
												?>

												<option value="<?php echo $d->Codigo;?>"
													<?
												    if ($Ob->getCodigoMarca () == $d->Codigo)
												    {
												    	echo "selected";
												    }
												    ?>
												>
												    <?php echo $d->Nombre;?>
												</option>

												<?php endforeach; //FIN PHP PRINCIPAL ?>
												</select> 
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
</body>
</html>