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
					Seleccione el rango de fechas y Nombre para poder imprimir el reporte 
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
							<div class="full-width panel-content">
								<div class="row">

                                     <div class="col-lg-3">
										 Sucursal:
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
									</div><p></p><p></p><p></p><p></p>

									<div class="col-lg-3">
										Fecha Inicio:
										<input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
									</div>

									<div class="col-lg-3">
										Fecha Fin:
										<input type="date" name="FechaFin" id="FechaFin" class="form-control">
									</div>


									<div class="col-md-2">

										Accion:
										<button type="button" class="btn btn-sm btn-primary Repor">Crear Reporte</button>
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

<script type="text/javascript">

	$(".Repor").off("click");
	$(".Repor").on("click", function(e) 
	{
		var Inicio = $('#FechaInicio').val();
		var Inicio1 = $('#FechaFin').val();
		var Sucursal = $('#SucursalB').val();

		if (Inicio == '' || Sucursal == '' || Inicio1 == '')
		{
			if (Inicio == '')
			{
				alert('POR FAVOR INDIQUE LA FECHA INICIAL');
			}
			if (Sucursal == '') {
				alert("POR FAVOR INDIQUE LA SUCURSAL");
			}
			if (Inicio1 == '') {
				alert("POR FAVOR INDIQUE FECHA FIN");
			}
		}
		else 
		{
			window.location = "index.php?view=Excel59&Sucursal="+Sucursal+"&Inicio="+Inicio+"&Inicio1="+Inicio1;
		}		
	});
</script>