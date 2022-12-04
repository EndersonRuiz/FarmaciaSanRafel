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
	<section class="full-width pageContent">
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Actualizar Producto
							</div>
							<div class="full-width panel-content">
								<form action="index.php?view=UpdateProducts" method="post" enctype="multipart/form-data" autocomplete="off">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del producto</h5>

											<?
										  		//INSTANCIAR LA CLASE EMPLEADOS

										        $model = new Productos ();

										        //MANDAR CODIGO OBTENIDO

										        $model->setCodigo ($_REQUEST['Codigo']);

										        //OBTENER LOS DATOS EN BASE AL CODIGO ENVIADO

										        $model->ObtenerDatos(); 
											?>

											<div class="mdl-textfield__expandable-holder">
												<input value="<? echo $model->getCodigo(); ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo">
												<label class="mdl-textfield__label" for="DNIAdmin">Codigo</label>
											</div>
											
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" value="<? echo $model->getCodigoBarra ();?>"  id="CodigoBarra" name="CodigoBarra">
												<label class="mdl-textfield__label" for="NameAdmin">CodigoBarra</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="Nombre" name="Nombre" value="<?echo $model->getNombre ();?>">
												<label class="mdl-textfield__label" for="LastNameAdmin">Nombre Producto</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<h6><font color="BLUE">Categoria:</font></h6>
												<select required="" class ="mdl-textfield__input" name="Categoria" id="Categoria">
												<?
													//INSTANCIA DE LA CLASE EMPLEADOS

											        $modelo = new Categorias();

											        //CARGAR LOS CAMPOS A LA VARIABLE $r

											        foreach($modelo->Listar($_REQUEST['Codigo']) as $res): 
												?>
													<option value="<?php echo $res->Codigo;?>"
													<?
												    if ($model->getCategoria () == $res->Codigo)
												    {
												    	echo "selected";
												    }
												    ?>
													>
														<?php echo $res->Nombre." (".$res->Medida.")";?>
													</option>
												<?php endforeach; //FIN PHP PRINCIPAL ?>	
												</select>
											</div>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="PrecioCosto" name="PrecioCosto" value="<?echo $model->getPrecioCosto ();?>">
												<label class="mdl-textfield__label" for="LastNameAdmin">Precio Costo</label>
											</div>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="PrecioVenta" name="PrecioVenta" value="<?echo $model->getPrecioVenta ();?>">
												<label class="mdl-textfield__label" for="LastNameAdmin">Precio Venta</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="PrecioTope" name="PrecioTope" value="<?echo $model->getPrecioTope ();?>">
												<label class="mdl-textfield__label" for="LastNameAdmin">Precio Tope</label>
											</div>

										</div>





										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Mas Detalles</h5>

											<?
												$productId = $_REQUEST['Codigo'];

												$Cod1 = array_column($model->ObtenerDescuentosModalCodigo($productId),'value')[0];
											    $Cod2 = array_column($model->ObtenerDescuentosModalCodigo($productId),'value')[1];
											    $Cod3 = array_column($model->ObtenerDescuentosModalCodigo($productId),'value')[2];
											    $Cod4 = array_column($model->ObtenerDescuentosModalCodigo($productId),'value')[3];
											    $Cod5 = array_column($model->ObtenerDescuentosModalCodigo($productId),'value')[4];
											    $Cod6 = array_column($model->ObtenerDescuentosModalCodigo($productId),'value')[5];


												$Desc1 = array_column($model->ObtenerDescuentosModalCodigo($productId),'caption')[0];
											    $Desc2 = array_column($model->ObtenerDescuentosModalCodigo($productId),'caption')[1];
											    $Desc3 = array_column($model->ObtenerDescuentosModalCodigo($productId),'caption')[2];
											    $Desc4 = array_column($model->ObtenerDescuentosModalCodigo($productId),'caption')[3];
											    $Desc5 = array_column($model->ObtenerDescuentosModalCodigo($productId),'caption')[4];
											    $Desc6 = array_column($model->ObtenerDescuentosModalCodigo($productId),'caption')[5];

											?>

											Descuentos:
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												0% <input type="checkbox" name="Descuento1" checked="true"
												<? 
												if ($Desc1 >0) 
												{
													echo "checked='true' value='".$Cod1."'";
												}
												else
												{
													echo " value='".$Cod1."'";
												}
												?>>

												&nbsp;&nbsp;10% <input type="checkbox" name="Descuento2" <? 
												if ($Desc2 >0) 
												{
													echo "checked='true' value='".$Cod2."'";
												}
												else
												{
													echo " value='".$Cod2."'";
												}
												?>>
												&nbsp;&nbsp;15% <input type="checkbox" name="Descuento3"
												<? 
												if ($Desc3 >0) 
												{
													echo "checked='true' value='".$Cod3."'";
												}
												else
												{
													echo " value='".$Cod3."'";
												}
												?>>
												&nbsp;&nbsp;20% <input type="checkbox" name="Descuento4"
												<? 
												if ($Desc4 >0) 
												{
													echo "checked='true' value='".$Cod4."'";
												}
												else
												{
													echo " value='".$Cod4."'";
												}
												?>>
												&nbsp;&nbsp;25% <input type="checkbox" name="Descuento5"
												<? 
												if ($Desc5 >0) 
												{
													echo "checked='true' value='".$Cod5."'";
												}
												else
												{
													echo " value='".$Cod5."'";
												}
												?>>
												&nbsp;&nbsp;35% <input type="checkbox" name="Descuento6"
												<? 
												if ($Desc6 >0) 
												{
													echo "checked='true' value='".$Cod6."'";
												}
												else
												{
													echo " value='".$Cod6."'";
												}
												?>>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<textarea class="mdl-textfield__input" style="height: 57px;" id="Descripcion" name="Descripcion" required=""><?echo $model->getDescripcion ();?></textarea>
												<label class="mdl-textfield__label" for="LastNameAdmin">Descripcion</label>
											</div>

											<center><h5 class="text-condensedLight">Foto</h5></center>

												<div class="col-5">
													<label for="archivo" class="col-sm-5 control-label">Foto o Imagen</label>
													<div >
														
														<?php 
															$idp = $model->getCodigo ();
															$path = "assets/FotosProductos/".$model->getCodigo();
															if(file_exists($path)){
																$directorio = opendir($path);
																while ($archivo = readdir($directorio))
																{
																	if (!is_dir($archivo)){
															
																		echo "<img  src='assets/FotosProductos/$idp/$archivo' width='300' height='300' />";

																		echo "<div data='".$path."/".$archivo."' ><a class='btn btn-success' href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><center><span class='glyphicon glyphicon-picture'> MOSTRAR FOTO EN TAMAÑO ORIGINAL </span></center></a>";

																		echo "<br></br>";
																		
																	}
																}
															}

															
														?>
														<input type='file' class='form-control' id='archivo' name='archivo'></input>
													</div>
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
		$('#Categoria').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Categoria', 'index.php?view=AutoCompleteCategorias&keyword=');
	</script>
</body>
</html>