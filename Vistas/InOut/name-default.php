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
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Salidas</a>
				<a href="#tabEntradas" class="mdl-tabs__tab">Envios</a>
				<!--<a href="#tabListAdmin" class="mdl-tabs__tab">Ver Movimientos</a>-->
			</div>

			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles bg-primary">
								Salidas
							</div>

							<div class="full-width panel-content">
								<div class="row col-lg-16">
									
									<div class="col-lg-4">
										<div>Origen:
											<br></br>
										  	<select class="form-control" id="Origen" name="Origen">
										  		<option>
							
										  		</option>
										  	</select>
										</div>
									</div>

									<div class="col-lg-4">
										<div>Destino:
											<br></br>
											<select class="form-control" id="Destino" name="Destino">
												<option></option>
											</select>
										</div>
									</div>

									<div class="col-lg-4">
										<div>Comentario:
											<br></br>
											<textarea name="Comentario" id="Comentario" class="form-control" style="height: 35px"></textarea>
										</div>
									</div>
                            	</div>

                            	<div class="full-width panel-content">
									<div class="row col-lg-16">

										<div class="col-lg-4">
		                                    <h5>Producto:</h5>
		                                    <select class="form-control select-box" id="cbo_producto" name="cbo_producto">
		                                        <option >
		                                           
		                                        </option>
		                                    </select>  
			                            </div>

			                            <div class="col-lg-4">
											<h5>Envia:</h5>
										    <input class="form-control" type="password" name="UserEnvia" id="UserEnvia">
										</div>
											
										<div class="col-lg-4">
											<h5>Solicita:</h5>
												
											<select class="form-control" id="UserSolicita" name="UserSolicita">
												<option></option>
											</select>
										</div>
									</div>
	                            </div>


							 	<div class="full-width divider-menu-h"></div>
								<div class="row table-responsive">
									<table class="table table-bordered table-hover" class="table table-striped">
										<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
											<tr>
												<th width="50px">
													<center>
														Cantidad
													</center>
												</th>
												<th>
													<center>
														Salida
													</center>
												</th>
												<th width="50px;">
													<center>
														Id
													</center>
												</th>
												<th width="50px">
													<center>
														CodBarra
													</center>
												</th>
												<th>
													<center>
														Nombre
													</center>
												</th>
												<th width="50px">
													<center>
														Existencia
													</center>
												</th>
												<th>
													<center>
														Ubicacion
													</center>
												</th>
												<th>
													<center>
														Categoria
													</center>
												</th>
												<th>
													<center>
														info
													</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td> 
													<input name="product_id" value="1" type="hidden">
                                        			<input class="form-control" required="" name="Cantidad" id="Cantidad" placeholder="" type="" autocomplete="off">
                                        		</td>
												<td> 
													<button type="submit" class="btn btn-primary" id="AgregarAFactura">
                                            			<i class="glyphicon glyphicon-shopping-cart"></i> Salida
                                        			</button>
                                        		</td>
                                        		<td>
													<input type="text" id="Id" name="Id" class="form-control" disabled="true">
												</td>
												<td>
													<input type="text" id="CodigoBarra" name="CodigoBarra" class="form-control" disabled="true">
												</td>
												<td>
													<input type="text" id="NombreProducto" name="NombreProducto" class="form-control" disabled="true">
												</td>
												<td>
													<input type="text" name="Existencia" id="Existencia" class="form-control" disabled="true" style="background-color: #FAFAD2;">
												</td>
												<td>
													<input type="text" id="Ubicacion" name="Ubicacion" class="form-control" disabled="true">
												</td>
												<td>
													<input type="text" name="Categoria" id="Categoria" class="form-control" disabled="true">
												</td>
												<td>
													<center>
														<a href="#" id="btnInfo" class="btn btn-default" data-target="#infoProduct" data-toggle="modal" onclick="DataProduct()"><i class="fa fa-eye"></i></a>
													</center>
												</td>
											</tr>
										</tbody>
									</table>
								</div>             
							</div>
						</div>
					</div>
				</div>
				<div class="full-width divider-menu-h">	
				</div>
					<div class="row table-responsive">
						<div class="full-width panel-content">
							<div class="container">
						 		<div class="row">
									<br>
									<div class="panel panel-info">
										 <div class="panel-heading">
									        <h3 class="panel-title">Productos</h3>
									      </div>
										<div class="panel-body detalle-producto">
											<?php
											session_start();
											 if(count($_SESSION['DetalleSalida'])>0){?>
												<table class="table">
												    <thead>
												        <tr>
												        	<th>Id</th>
												            <th>Descripci&oacute;n</th>
												            <th>Cantidad</th>
												            <th>Precio</th>
												            <th>Subtotal</th>
												            <th>Eliminar</th>
												        </tr>
												    </thead>
												    <tbody>
												    	<?php 
												    	foreach($_SESSION['DetalleSalida'] as $k => $detalle){ 
												    	?>
												        <tr>
												        	<td><?php echo $detalle['id'];?></td>
												            <td><?php echo $detalle['producto']."(".$detalle['sucursal'].")";?></td>
												            <td><?php echo $detalle['cantidad'];?></td>
												            <td><?php echo $detalle['precio'];?></td>
												            <td><?php echo $detalle['subtotal'];?></td>
												            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
												        </tr>
												        <?php }?>
												    </tbody>
												</table>
											<?php }else{?>
											<div class="panel-body"> No hay productos agregados</div>
											<?php }?>
										</div>
									</div>
								<div class="row">
									<div class="col-md-1 text-right">
										<button type="button" class="btn btn-sm btn-success guardar-carrito"> Enviar Productos</button>
									</div>
								</div>
							</div>
						</div>           
					</div>
				</div>
			</div>

			<!--<div class="mdl-tabs__panel" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Listado de Salidas
							</div>
			                <div class="full-width divider-menu-h">
			                </div>
							<div class="row table-responsive">
								 tabla con paginacion 
							</div>
						</div> 
					</div>
				</div>
			</div>-->

			<div class="mdl-tabs__panel" id="tabEntradas">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles" style="background-color: #008080;">
								Envios  de medicamentos a otras sucursales
							</div>
			                <div class="full-width divider-menu-h">
			                </div>
							<div class="row table-responsive">
								<!-- tabla con paginacion -->


								<table class="table table-bordered table-hover display" class="table table-striped" id="miTabla_1">
									<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
										<tr>
											<th><center>Factura</center></th>
											<th style="width: 50px;"><center>Id</center></th>
											<th><center>Cod</center></th>
											<th><center>Producto</center></th>
											<th><center>Cantidad</center></th>
											<th><center>FechaEnvio</center></th>
											<th style="width: 50px;"><center>Info</center></th>
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
	</section>

	<!-- MENU O MODAL PARA OBTENER LOS DATOS DEL PRODUCTO EN INVENTARIO -->

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
                                </div>  <!-- /modal-footer -->

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

                                <h5><font color="BLUE"> Laboratorio</font></h5>

                                <hr></hr>
                                <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Casa</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="house"  name="house" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Marca</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="mark"  name="mark" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                <br></br>

                                <h5><font color="BLUE"> Sucursal/Ubicacion/Existencia </font></h5>
                                <hr></hr>
                                <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Sucursal</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="Suc"  name="Suc" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Ubicacion/Estante</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="Loca"  name="Loca" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                 <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Gabeta/Exacta</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="Loca_1"  name="Loca_1" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                 <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Existencia:</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="Stock"  name="Stock" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                <hr></hr>
                                <br></br>
                              

                                <h5><font color="BLUE"> Precios/Costos/Etc. </font></h5>

                                <hr></hr>
                                <br></br>
           

                                <!-- <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Precio Costo</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="Cost"  name="idProductName" disabled="true" autocomplete="off">
                                        </div>
                                </div> -->

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

                                <hr></hr>
                                <br></br>
                              

                                <h5><font color="BLUE"> Adiminstracion/Receta/Indicacion/Etc. </font></h5>

                                <hr></hr>
                                <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Descripcion</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control" id="Description"  name="idProductName" disabled="true" autocomplete="off"></textarea>
                                        </div>
                                </div> <!-- /form-group-->
                                <br></br>
                            </form><!--form-->
                        </div> <!-- /product info -->
                    </div><!--End tab panels-->
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>

	<script type="text/javascript">
		//AUTOCOMPLETADOR O BUSCADOR AL SELECT

        $('#Origen').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Origen', 'index.php?view=AutocompleteSucursal&keyword=');

        $('#Destino').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Destino', 'index.php?view=AutocompleteSucursal&keyword=');

         $('#UserSolicita').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('UserSolicita', 'index.php?view=AutoCompleteUsers&keyword=');

        //SCRIPT PARA DEVOLVER LA PAGINACION DE LA TABLA

         var objetoDataTables_personal = $('#miTabla_1').DataTable({
            "language": {
                "emptyTable":           "No hay datos disponibles en la tabla.",
                "info":             "Del _START_ al _END_ de _TOTAL_ ",
                "infoEmpty":            "Mostrando 0 registros de un total de 0.",
                "infoFiltered":         "(filtrados de un total de _MAX_ registros)",
                "infoPostFix":          "(actualizados)",
                "lengthMenu":           "Mostrar _MENU_ registros",
                "loadingRecords":       "Cargando...",
                "processing":           "Procesando...",
                "search":           "Buscar:",
                "searchPlaceholder":        "Dato para buscar",
                "zeroRecords":          "No se han encontrado coincidencias.",
                "paginate": {
                    "first":        "Primera",
                    "last":         "Última",
                    "next":         "Siguiente",
                    "previous":     "Anterior"
                },
                "aria": {
                    "sortAscending":    "Ordenación ascendente",
                    "sortDescending":   "Ordenación descendente"
                }
            },
            "lengthMenu":               [[5,10,20,25,50,100], [5,10,20,25,50,100]],
            "iDisplayLength":           10,
            "bServerSide":              true,
            "sAjaxSource":              "index.php?view=FetchSalidas",
            "columns" : [
                {"data": 0},
                {"data": 1},
                {"data": 2},
                {"data": 3},
                {"data": 4},
                {"data": 5},
                {"data": 6}
            ],
            "order":[[1,"asc"]]
        });
        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');


        //METOTO PARA VERIFICAR QUE NO SE MUEVAN PRODUCTOS A LA MISMA SUCURSAL

        function VerificaSucursal ()
        {
        	var Origen = $('#Origen').val();
        	var Destino = $('#Destino').val();

        	if (Origen == Destino)
        	{
        		alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> No se puede mover a la misma sucursal</font> ');
	        	setTimeout(function()
				{
				  	location.reload ();
				}, 1000);
        	}
        	else
        	{
        		if(Origen != '' && Destino != '')
        		{
        			if (Origen == '1')
        			{
        				$('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
	        			chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteSanJuan&keyword=');
        			}
        			if(Origen == '2')
        			{
        				$('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
	        			chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteBodeguita&keyword=');
        			}
        			if(Origen == '3')
        			{
        				$('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
	        			chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteBodega&keyword=');
        			}
        			if(Origen == '4')
        			{
        				$('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
	        			chosen_ajaxify('cbo_producto', 'index.php?view=AutoComplete1&keyword=');
        			}
        			if(Origen == '5')
        			{
        				$('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
	        			chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteSanRafael1&keyword=');
        			}
	        	}
        	}
        }

        //AL SELECCIONAR UNA SUCURSAL VERIFICAR SI ES VALIDA

        $('select[name=Origen]').change(function()
        {
        	var IdProd = $('#Origen').val();
        	VerificaSucursal();
        });

        $('select[name=Destino]').change(function()
        {
        	var IdProd = $('#Destino').val();
        	VerificaSucursal();
        });

        //METODO PARA DEVOLVER LOS DATOS A EL FORMULARIO DE INGRESO

        function DataProduct_2(productId) {
		    if (productId) {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=InventoryModalData',
		            type: 'post',
		            data: {productId: productId},
		            dataType: 'json',
		            success:function(response) {      
		              	$("#Id").val(response.CodigoInventario);
		                $("#CodigoBarra").val(response.CodigoBarra);
		                $("#NombreProducto").val(response.NombreProducto);
		                $("#Existencia").val(response.Existencia);
		                $("#Ubicacion").val(response.Location + " (" + response.Seccion + ")");
		                $("#Categoria").val(response.NameCategoria + "(" + response.Medida +")");
		           
		        } //success function

	        })// /ajax to fetch product image

	        }else{
	            alert("ERROR AL Mostrar DATOS");
	        }
	    }

	    //AL SELECCIONAR UN PRODUCTO DEVOLVER LA INFORMACION

        $('select[name=cbo_producto]').change(function()
        {
        	var IdProd = $('#cbo_producto').val();
        	DataProduct_2(IdProd);
        });

        //METODO PARA DEVOLVER AL MODAL TODOS LOS DATOS DE UN PRODUCTO EN INVENTARIO

		 function DataProduct() 
		 {
		 	var productId = $("#Id").val();
		    if (productId) 
		    {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=InventoryModalData',
		            type: 'post',
		            data: {productId: productId},
		            dataType: 'json',
		            success:function(response) {        
		                $("#getProductImage").attr('src', 'assets/FotosProductos/'+response.imagen);
		                $("#idProductName").val(response.CodigoInventario);
		                $("#BarCode").val(response.CodigoBarra);
		                $("#ProductName").val(response.NombreProducto);
		                $("#CategoryName").val(response.NameCategoria + " (" + response.Medida + ")");
		                $("#house").val(response.NameCasa);
		                $("#mark").val(response.NameMarca);
		                $("#Suc").val(response.NameSucursal);
		                $("#Loca").val(response.Location);
		                $("#Loca_1").val(response.Seccion);
		                $("#Stock").val(response.Existencia);
		                $("#Cost").val(response.PrecioCosto);
		                $("#PrecSales").val(response.PrecioVenta);
		                $("#PrecTope").val(response.PrecioTope);
		                $("#Description").val(response.Descripcion);
		        } //success function

	        })// /ajax to fetch product image

	        }
	        else{
	            alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Primero seleccione un producto de inventario</font> ');
	        }
    	}

    	//METODO PARA DEVOLVER AL MODAL TODOS LOS DATOS DE UN PRODUCTO EN INVENTARIO

		 function DataProducts(productId) 
		 {
		    if (productId) 
		    {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=InventoryModalData',
		            type: 'post',
		            data: {productId: productId},
		            dataType: 'json',
		            success:function(response) {        
		                $("#getProductImage").attr('src', 'assets/FotosProductos/'+response.imagen);
		                $("#idProductName").val(response.CodigoInventario);
		                $("#BarCode").val(response.CodigoBarra);
		                $("#ProductName").val(response.NombreProducto);
		                $("#CategoryName").val(response.NameCategoria + " (" + response.Medida + ")");
		                $("#house").val(response.NameCasa);
		                $("#mark").val(response.NameMarca);
		                $("#Suc").val(response.NameSucursal);
		                $("#Loca").val(response.Location);
		                $("#Loca_1").val(response.Seccion);
		                $("#Stock").val(response.Existencia);
		                $("#Cost").val(response.PrecioCosto);
		                $("#PrecSales").val(response.PrecioVenta);
		                $("#PrecTope").val(response.PrecioTope);
		                $("#Description").val(response.Descripcion);
		        } //success function

	        })// /ajax to fetch product image

	        }
	        else{
	            alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Primero seleccione un producto de inventario</font> ');
	        }
    	}


    	//ENVIAR DATOS SOBRE DETALLE COMPRA POR MEDIO DE AJAX JQUERY Y DEVOLVER CON PHP JSON

        $('#AgregarAFactura').unbind('click').bind('click', function(){
        	var Cod = $('#cbo_producto').val();
        	var Product = $('#Cantidad').val();
        	var Origen = $('#Origen').val();
        	var Destino = $('#Destino').val();
        	var Comentario = $('#Comentario').val();
        	var UserSolicita = $('#UserSolicita').val();
        	var UserEnvia = $('#UserEnvia').val();
      
        	if (Cod == '' || Product == '' || Origen == '' || Destino == '' || UserSolicita == '' || UserEnvia == '')
	       	{
	       		if (Cod == '')
	        	{
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Busque y seleccione un producto</font> ');
	        	}
	        	if (Product == '')
	        	{
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique la cantidad</font> ');
	        	}
	        	if (Origen == '')
	        	{
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique el Origen</font> ');
	        	}
	        	if (Destino == '')
	        	{
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique el Destino</font> ');
	        	}
	        	if(UserSolicita == '')
	        	{
	        		alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique el Usuario que Solicita</font> ');
	        	}
	        	if (UserEnvia == '')
	        	{
	        		alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique el Usuario que Envia</font> ');
	        	}
	        }
	        else
	        {
	        	$.ajax({
					url: 'index.php?view=VerificaExistenciaSalida',
					type: 'post',
					data: {
						'Codigo':Cod,'Cant':Product,'Origen':Origen,'Destino':Destino,'Comentario':Comentario,'UserEnvia':UserEnvia,'UserSolicita':UserSolicita
					},
					dataType: 'json',
					success: function(data) 
					{
						if(data.success==true)
						{
							alertify.success(data.msj);
							$(".detalle-producto").load('index.php?view=DetalleSalida');
						}
						else
						{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) 
					{
						alertify.error(error);
					}
				});
	        }
        });

        //SCRIPT PARA QUITAR UN ELEMENTO DE LA LISTA

		$(".eliminar-producto").off("click");
		$(".eliminar-producto").on("click", function(e) 
		{
			var id = $(this).attr("id");
			$.ajax({
				url: 'index.php?view=EliminarDetalleSalida',
				type: 'post',
				data: {'id':id},
				dataType: 'json'
			}).done(function(data)
			{
				if(data.success == true)
				{
					alertify.success(data.msj);
					$(".detalle-producto").load('index.php?view=DetalleSalida');
				}
				else
				{
					alertify.error(data.msj);
				}
			})
		});

		//SCRIPT PARA LEER CUANDO PRECSIONAN GURDAR LA FACTURA Y PROCEDER A HACERLO

		$(".guardar-carrito").off("click");
		$(".guardar-carrito").on("click", function(e) 
		{
			$.ajax({
				url: 'index.php?view=AddDetalleSalida',
				type: 'post',
				dataType: 'json',
				success: function(data) 
				{
					if(data.success==true)
					{
						alertify.success(data.msj);
						$(".guardar-carrito").disabled = true;

						setTimeout(function()
						{
						  	window.location = "index.php?view=InOut";
						}, 4000);									
					}
					else
					{
						alertify.error(data.msj);
					}
				},
				error: function(jqXHR, textStatus, error)
				{
					alertify.set('notifier','position','top-right');
	        	    alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Codigo de Usuario no valido</font> ');
				}
			});				
		});

	</script>
</body>
</html>