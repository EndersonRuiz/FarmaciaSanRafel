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
					Este es el modulo de Registro de los Laboratios o la casa del producto... 
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
								Nuevo Laboratorio
							</div>
							<div class="full-width panel-content">
								<form action="index.php?view=AddLaboratorie" method="POST">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos de los Laboratorios</h5>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<h5>Casa:</h5>
												<select name="CodigoCasa" class="mdl-textfield__input" required="">
												<?
													//INSTANCIA DE LA CLASE EMPLEADOS

											        $model = new CatalogoCasas();

											        //CARGAR LOS CAMPOS A LA VARIABLE $r

											        foreach($model->Listar() as $r): 
												?>
												    <option value="<?php echo $r->Codigo;?>">
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

												<option value="<?php echo $d->Codigo;?>">
												    <?php echo $d->Nombre;?>
												</option>

												<?php endforeach; //FIN PHP PRINCIPAL ?>
												</select> 
											</div>

										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
												<h5 class="text-condensedLight">Mas Detalles</h5>

												<br/>
												<br/>
												<br/>
											
												<a href="#modalContactForm" class="btn btn-primary" data-toggle="modal"><i class="fa fa-folder-open"> Registrar casa </i></a>
												<br/>
												<br/>
												<br/>
												<br/>
												<a href="#modalContactForms" class="btn btn-primary" data-toggle="modal"><i class="fa fa-folder-open"> Registrar marca </i></a>

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
								Listado de los Laboratorios
							</div>
							<div class="full-width panel-content">

		</div>



        <div class="full-width divider-menu-h"></div>
			<div class="row table-responsive">
				<table class="table table-bordered table-hover display" class="table table-striped" id="TableLabs">
					<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
						<tr>
							<th style="width: 50px;"><center>Id</center></th>
							<th><center>Casa</center></th>
							<th><center>Marca</center></th>
							<th style="width: 50px;"><center>Modificar</center></th>
							<th style="width: 50px;"><center>Eliminar</center></th>
						</tr>
					</thead>
					<tbody>
					<?
						//INSTANCIA DE LA CLASE EMPLEADOS

				        $model_2 = new Laboratorios();

				        //CARGAR LOS CAMPOS A LA VARIABLE $r

				        foreach($model_2->Listar() as $res): 
					?>
						<tr>
							<td><? echo $res->Codigo;?></font></td>
							<td><? echo $res->Nombre;?></td>
							<td><? echo $res->NomMarca;?></td>
							<td><center><a href="index.php?view=EditLaboratorie&Codigo=<?echo $res->Codigo;?>"><span class="glyphicon glyphicon-pencil"></span></a></center></td>
							<td>
								<center>
									<a href="index.php?view=DeleteLaboratorie&Codigo=<?echo $res->Codigo;?>" onclick="javascript:return confirm('DESEA ELIMINAR ESTE REGISTRO..!');"><span class="glyphicon glyphicon-trash"></span></a>
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

	<!-- MENU PARA REGISTRAR UNA CASA -->

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">REGISTRO DE CASAS</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">NOMBRE DE LA CASA:</label>
                    <input type="text" id="fname" class="form-control validate">
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="send" class="btn btn-info">Registrar <i class="fa fa-paper-plane-o ml-1"></i></button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
	 $(document).ready(function(){
	 $('#modalContactForm').on('click', '.btn-info', function(e){
     var vfname = $('#fname').val();
	
			$.post("index.php?view=AddHome", //Required URL of the page on server
               { // Data Sending With Request To Server
                  fname:vfname,
               },
			function(response,status){ // Required Callback Function
             $("#result").html(response);//"response" receives - whatever written in echo of above PHP script.
            
          });
		  
     $('#modalContactForm').modal('hide');
   });
   });
  </script>


  <!-- MENU PARA REGISTRAR UNA Marca -->


<div class="modal fade" id="modalContactForms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">REGISTRO DE MARCAS</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="NombreMarca">NOMBRE DE LA MARCA:</label>
                    <input type="text" id="NombreMarca" class="form-control validate">
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="send" class="btn btn-info">Registrar <i class="fa fa-paper-plane-o ml-1"></i></button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
	 $(document).ready(function(){
	 $('#modalContactForms').on('click', '.btn-info', function(e){
     var NombreMarcax = $('#NombreMarca').val();
			$.post("index.php?view=AddBrands", //Required URL of the page on server
               { // Data Sending With Request To Server
                  NombreMarca:NombreMarcax,
               },
			function(response,status){ // Required Callback Function
             $("#results").html(response);//"response" receives - whatever written in echo of above PHP script.
            
          });
		  
     $('#modalContactForms').modal('hide');
   });
   });
  </script>
  

  <div class="text-center">
    <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalContactForm">Launch Modal Contact Form</a>
	<br>
	<div class="modal-body">
        <div id="result"></div>
    </div>
</div>


  <div class="text-center">
    <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalContactForms">Launch Modal Contact Form</a>
	<br>
	<div class="modal-body">
        <div id="results"></div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
				$('#TableLabs').DataTable({
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
</html>