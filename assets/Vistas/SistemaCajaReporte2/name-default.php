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
                                     	<div>
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
                                       </div>
									</div>

									<div class="col-lg-3">
										<div>
										Fecha de Reporte:
										<input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
									    </div>
									</div>

									<div class="col-lg-3">
                                     	<div>
										 Sucursal:
                                        <select name="Turnos" id="Turnos" class="mdl-textfield__input" required="">
                                         <option>Turno Mañana</option>
                                         <option>Turno Tarde</option>      
                                        </select>
                                       </div>
									</div>
								</div>
                                <p></p>
								<div class="row">
									<div class="col-md-2">
                                        <div class="text-center">
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
		</div>
	</section>
</body>

<script type="text/javascript">

	$(".Repor").off("click");
	$(".Repor").on("click", function(e) 
	{
		var Inicio = $('#FechaInicio').val();
		var Sucursal = $('#SucursalB').val();
		var Turnos = $('#Turnos').val();

		if (Inicio == '' || Sucursal == '' || Turnos == '' )
		{
			if (Inicio == '')
			{
				alert('POR FAVOR INDIQUE LA FECHA INICIAL');
			}
			if (Sucursal == '') {
				alert("POR FAVOR INDIQUE LA SUCURSAL");
			}
			if(Turnos == ''){
				alert("POR FAVOR INDIQUE LA HORA DE SALIDA DE TURNO");
			}
		}
		else 
		{
			window.location = "index.php?view=SistemaCajaReporte3&Inicio="+Inicio+"&Sucursal="+Sucursal+"&Turnos="+Turnos;
		}		
	});
</script>