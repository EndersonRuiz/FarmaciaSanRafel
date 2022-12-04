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
<body onload="Repetir()">
     <!-- pageContent -->
	<section class="full-width pageContent">
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Producto Rastreado</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles" style="background-color: #A80707">
								Salidas del Producto en Farmacia
							</div>

							<div class="full-width panel-content">

								<div class="row">
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS
								        $model = new Ventas ();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->RastrearProductoSalida1($_REQUEST['Origen'],$_REQUEST['FechaInicio'],$_REQUEST['FechaFin']) as $r): 
								    ?>
									<br></br>
                                    <div class="col-md-3">
                                    	Nombre Producto
        	                          <input type="text" name="usuario1" id="usuario1" class="form-control" autofocus="" disabled="true" value="<?php echo $r->NombreProducto; ?>" >
      	                             </div>
      	                             <div class="col-md-3">
      	                             	Cantidad
        	                          <input type="text" name="usuario1" id="usuario1" class="form-control" autofocus="" disabled="true" value="<?php echo $r->Total; ?>">
      	                             </div>
      	                             <?php endforeach; //FIN PHP PRINCIPAL ?> 	
      	                             <br></br><br></br>
                                </div>
								


							 <div class="full-width divider-menu-h"></div>
								<div class="row table-responsive">
									<table class="table table-bordered table-hover" class="table table-striped" id="TableUsers">
										<thead class="bg-primary">
											<tr style="background-color: #5C0449;">
												<th width="100px">
													<center>
														Pedido
													</center>
												</th>
												<th  width="1500px;">
													<center>
														NombreProducto
													</center>
												</th>
												<th width="100px;">
													<center>
													    Cant.
													</center>
												</th>
												<th width="250px;">
													<center>
													    Fecha
													</center>
												</th>
												<th width="250px">
													<center>
														Hora
													</center>
												</th>
												<th width="500px">
													<center>
														UsuarioEnvia
													</center>
												</th>
												<th width="500px">
													<center>
														SucursalEnvia
													</center>
												</th>
												<th width="500px">
													<center>
														UsuarioRecibe
													</center>
												</th>
												<th width="1000px">
													<center>
														SucursalRecibe
													</center>
												</th>
											</tr>
										</thead>
										<tbody>
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS
								        $model = new Ventas ();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->RastrearProductoSalida($_REQUEST['Origen'],$_REQUEST['FechaInicio'],$_REQUEST['FechaFin']) as $r): 
								    ?>
						            <tr>
						            	<td><?php echo $r->Pedido; ?></td>
						                <td><?php echo $r->NombreProducto; ?></td>
						                <td><?php echo $r->Cantidad; ?></td>
						                <td><?php echo $r->fecha; ?></td>
						                <td><?php echo $r->hora; ?></td>
						                <td><?php echo $r->NombreEnvia; ?></td>
						                <td><?php echo $r->SucursalEnvia; ?></td>
						                <td><?php echo $r->NombreRecibe; ?></td>
						                <td><?php echo $r->Nombre; ?></td>
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




	<script>
		
	$(document).ready(function(){
				$('#TableUsers').DataTable({
					"order": [[0, "desc"]],
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
</html>