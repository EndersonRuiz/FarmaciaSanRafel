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
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Esta Seccion Es Para Ver Las Entradas
					      De Productos A SUCURSALES
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
								Reporte por fechas
							</div>
							 <form action="prueva/reporte12/" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="row table-responsive">
							<div class="full-width panel-content">
								<div class="container">
								<div class="row">

									<div class="col-md-3">
										Fecha Entrada:
										<input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
									</div>									
									
									<div class="col-sm-3">
													<div>Sucursal
                                                        <select name="SucursalB" id="SucursalB" class="mdl-textfield__input" required="">
                                                        <?
                                                            //INSTANCIA DE LA CLASE EMPLEADOS

                                                            $model = new Sucursales();

                                                            //CARGAR LOS CAMPOS A LA VARIABLE $r

                                                            foreach($model->Listar() as $r): 
                                                        ?>
                                                            <option value="<?php echo $r->Codigo;?>">
                                                                <?php echo $r->Nombre;?>
                                                            </option>
                                                            <?php endforeach; //FIN PHP PRINCIPAL ?>
                                                        </select>
                                    </div></div>

									<div class="col-md-2">
										Accion:
										<button type="submit" class="btn btn-sm btn-primary Repor">Crear Reporte</button>
									</div>
								</div>
							</form>
							</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
