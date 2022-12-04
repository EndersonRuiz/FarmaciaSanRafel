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
								<div class="row" style="margin-top: 19px;">

									<div class="col-sm-3">
										<div>Usuario:
										    <select class="col-md-2 form-control select-box" id="cbo_usuario" name="cbo_usuario">
										    <option></option>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div>
											Fecha Inicio:
										<input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
    									</div>
									</div>

									<div class="col-md-4">
										<div>
											Fecha Fin:
										    <input type="date" name="FechaFin" id="FechaFin" class="form-control">
    									</div>
									</div>


								</div>
								<hr>
									<div class="row" style="margin-top: 19px;">
										<div class="col-md-4" class="text-center">
										<div>Accion:
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

	$('#cbo_usuario').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('cbo_usuario', 'index.php?view=AutoCompleteUsers&keyword=');


	$(".Repor").off("click");
	$(".Repor").on("click", function(e) 
	{
		var Inicio = $('#FechaInicio').val();
		var Inicio1 = $('#FechaFin').val();
		var Usuario = $('#cbo_usuario').val();

		if (Inicio == '' || Inicio1 == '' || Usuario == '')
		{
			if (Inicio == '')
			{
				alert('POR FAVOR INDIQUE LA FECHA INICIAL');
			}
			if (Inicio1 == '') {
				alert("POR FAVOR INDIQUE FECHA FIN");
			}
			if (Usuario == '') {
				alert("POR FAVOR INDIQUE Usuario");
			}
		}
		else 
		{
			window.location = "index.php?view=Excel63&Usuario="+Usuario+"&Inicio="+Inicio+"&Inicio1="+Inicio1;
		}		
	});
</script>