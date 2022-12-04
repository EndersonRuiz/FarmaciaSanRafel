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

?>     <!-- pageContent -->
	<section class="full-width pageContent">
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
								Nuevo Producto
							</div>

							<div class="full-width panel-content">
								<form action="index.php?view=AddProduct" method="post" enctype="multipart/form-data" autocomplete="off">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del Producto</h5>
										
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="CodigoBarra" name="CodigoBarra">
												<label class="mdl-textfield__label" for="NameAdmin">CodigoBarra</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="Nombre" name="Nombre">
												<label class="mdl-textfield__label" for="LastNameAdmin">Nombre Producto</label>
											</div>
											

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<h6><font color="BLUE">Categoria:</font></h6>
												<select required="" class ="mdl-textfield__input" name="Categoria" id="Categoria">
													<option></option>
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
												<input class="mdl-textfield__input" required="" type="text"  id="PrecioCosto" name="PrecioCosto" pattern="-?[0-9.]*(\.A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš+)?">
												<label class="mdl-textfield__label" for="LastNameAdmin">Precio Costo</label>
											</div>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="PrecioVenta" name="PrecioVenta" pattern="-?[0-9.]*(\.A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš+)?">
												<label class="mdl-textfield__label" for="LastNameAdmin">Precio Venta</label>
											</div>

											

										</div>

										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Mas Detalles</h5>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" required="" type="text"  id="PrecioTope" name="PrecioTope" pattern="-?[0-9.]*(\.A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš+)?">
												<label class="mdl-textfield__label" for="LastNameAdmin">Precio Tope</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<textarea class="mdl-textfield__input" style="height: 77px;" id="Descripcion" name="Descripcion" required=""></textarea>
												<label class="mdl-textfield__label" for="LastNameAdmin">Descripcion</label>
											</div>

											<center><h5 class="text-condensedLight">Foto</h5></center>

											

											<div class="form-group">
												<label for="archivo" class="col-sm-2 control-label">Imagen</label>
												<div class="col-sm-10">
													<input type="file" class="form-control" id="archivo" name="archivo">
												</div>
											</div>
											<br></br>
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
								Listado de Productos
							</div>


                            <div class="full-width divider-menu-h"></div>
			<div class="row table-responsive">

		
				<table class="display" id="miTabla_1">
					<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
						<tr>
							<th>Id</th>
							<th>CodigoBarra</th>
							<th>Nombre</th>
							<th>PrecioCosto</th>
							<th>PrecioVenta</th>
							<th>PrecioTope</th>
							<th style="width: 50px;">Información</th>
							<th style="width: 50px;">Modificar</th>
							<th style="width: 50px;">Eliminar</th>
						</tr>
					</thead>
					<tbody>
				
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


	<!-- MENU PARA VER LOS DATOS COMPLETOS DEL PRODUCTO -->


	<div class="modal fade" id="infoProduct" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
		<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><i class="fa fa-eye"></i> Datos del producto</h4>
	      	</div>

	      	<div class="modal-body" style="max-height:450px; overflow:auto;">

				<!--<div class="div-loading">
	      			<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Cargando...</span>
	      		</div> -->

	      		<div class="div-result">
				
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Imagen</a>
						</li>
						<li role="presentation">
							<a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab" >Información del producto</a>
						</li>
					</ul>

					<!-- Tab panes -->
				 	<div class="tab-content">

				 		<div role="tabpanel" class="tab-pane active" id="photo">
				 			<form action="php_action/editProductImage.php" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">
				 				<br />
				    			<div id="edit-productPhoto-messages"></div>

				    			<div class="form-group">
						        	<label for="editProductImage" class="col-sm-3 control-label">Imagen: </label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">							    				   
									      <img src="" id="getProductImage" class="thumbnail" style="width:250px; height:250px;" />
									    </div>
			        			</div> <!-- /form-group-->

			        			<div class="modal-footer editProductPhotoFooter">
				        			<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				      			</div>	<!-- /modal-footer -->

				 			</form><!--FORM-->
				 		</div> <!-- product image -->

						<!-- Información Producto -->
				 		<div role="tabpanel" class="tab-pane" id="productInfo">
				 			<form action="#" method="POST">
				 				<br />
								<div id="edit-product-messages"></div>

								<div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Codigo</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="idProductName"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->	

						        <br></br>

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Codigo Barra</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="BarCode"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Nombre</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="ProductName"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Categoria</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="CategoryName"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Precio Costo</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="Cost"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Precio Venta</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="PrecSales"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Precio Tope</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="PrecTope"  name="idProductName" disabled="true" autocomplete="off">
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>

							

						        <div class="form-group">
						        	<label for="idProductName" class="col-sm-3 control-label">Descripcion</label>
						        	<label class="col-sm-1 control-label">: </label>
									    <div class="col-sm-8">
									      <textarea class="form-control" id="Description"  name="idProductName" disabled="true" autocomplete="off"></textarea>
									    </div>
						        </div> <!-- /form-group-->

						        <br></br>
						 
						       
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<label for="idProductName" class="col-sm-3 control-label">Descuentos</label>
						        	<label class="col-sm-1 control-label">: </label>
									<div class="col-sm-3">
										<select id="SelectDescuentos" id="SelectDescuentos" class="form-control col-sm-3">
											
										</select>
									</div>
								</div>

								<br></br>

				 			</form><!--form-->
				 		</div> <!-- /product info -->
					</div><!--End tab panels-->
	      		</div><!--DIV RESULT-->
	      	</div><!--Modal Body-->
		</div> <!--Modal Conten-->
		</div> <!-- Modal Dialog-->
	</div>




<script>
	function DataProduct(productId) {

	if (productId) {
		//MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		$.ajax({
			url: 'index.php?view=FetchProduct',
			type: 'post',
			data: {productId: productId},
			dataType: 'json',
			success:function(response) {		
				$("#getProductImage").attr('src', 'assets/FotosProductos/'+response.imagen);
				$("#idProductName").val(response.Codigo);
				$("#BarCode").val(response.CodigoBarra);
				$("#ProductName").val(response.NombreProducto);
				$("#CategoryName").val(response.Nombre);
				$("#Cost").val(response.PrecioCosto);
				$("#PrecSales").val(response.PrecioVenta);
				$("#PrecTope").val(response.PrecioTope);
				$("#Description").val(response.Descripcion);	

				$('#SelectDescuentos').empty();

				$("#SelectDescuentos").append('<option>' + response.Desc1 + '%' + "</option>");
				$("#SelectDescuentos").append('<option>' + response.Desc2 + '%' + "</option>");
				$("#SelectDescuentos").append('<option>' + response.Desc3 + '%' + "</option>");
				$("#SelectDescuentos").append('<option>' + response.Desc4 + '%' + "</option>");
				$("#SelectDescuentos").append('<option>' + response.Desc5 + '%' + "</option>");
				$("#SelectDescuentos").append('<option>' + response.Desc6 + '%' + "</option>");		
			} //success function

		})// /ajax to fetch product image

	}else{
		alert("ERROR AL Mostrar DATOS");
	}

}

</script>






<script>
		$(document).ready(function(){
				$('#miTabla_1').DataTable({
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
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "index.php?view=ResProduct"
				});
			});
	</script>

	<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.delete').click(function(){
					var parent = $(this).parent().attr('Codigo');
					var service = $(this).parent().attr('data');
					var dataString = 'Codigo='+service;
					
					$.ajax({
						type: "POST",
						url: "index.php?view=DeleteProduct",
						data: dataString,
						success: function() {			
							location.reload();
						}
					});
				});                 
			});    
		</script>

		<script type="text/javascript">
		$('#Categoria').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Categoria', 'index.php?view=AutoCompleteCategorias&keyword=');
	</script>

</body>
</html>