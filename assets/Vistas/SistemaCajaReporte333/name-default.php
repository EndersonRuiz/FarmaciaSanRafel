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
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Total Ventas</a>
				<a href="#tabListAdmin" class="mdl-tabs__tab">Ver ventas</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles" style="background-color: #4B0082">
								Salidas de Productos Farmacia San Rafael
							</div>

							<div class="full-width panel-content">
								<div class="row">
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS
								        $model = new Ventas ();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->ReporteVentasSanRafa11s($_REQUEST['Inicio'],$_REQUEST['Sucursal'],$_REQUEST['Turnos']) as $r): 
								    ?>
									<br></br>
                                    <div class="col-md-3">
                                    	Total Venta
        	                          <input type="text" name="usuario1" id="usuario1" class="form-control" autofocus="" disabled="true" value="<?php echo $r->Total; ?>" >
      	                             </div>
      	                             <div class="col-md-3">
      	                             	Bonoficacion
        	                          <input type="text" name="usuario1" id="usuario1" class="form-control" autofocus="" disabled="true" value="<?php echo $r->Bono; ?>">
      	                             </div>
      	                             <div class="col-md-3">
      	                             	Descuento
        	                          <input type="text" name="usuario1" id="usuario1" class="form-control" autofocus="" disabled="true" value="<?php echo $r->Descuento; ?>">
      	                             </div>
      	                             <div class="col-md-3">
      	                             	Total Cobrado
        	                          <input type="text" name="usuario1" id="usuario1" class="form-control" autofocus="" disabled="true" value="<?php echo $r->TotalCobrado; ?>">
      	                             </div>
      	                             <?php endforeach; //FIN PHP PRINCIPAL ?> 	
      	                             <br></br><br></br>
                                </div>


							 <div class="full-width divider-menu-h"></div>
								<div class="row table-responsive">
									<table class="table table-bordered table-hover" class="table table-striped" >
										<thead class="bg-primary">
											<tr style="background-color: #4B0082;">
												<th width="1500px">
													<center>
														Nombre Dependiente
													</center>
												</th>
												<th  width="850px;">
													<center>
														Total Vendido
													</center>
												</th>
												<th width="850px;">
													<center>
													    Bonificaciones
													</center>
												</th>
												<th width="850px;">
													<center>
													    Descuentos
													</center>
												</th>
												<th width="850px">
													<center>
														Total Cobrado
													</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<?
										//INSTANCIA DE LA CLASE EMPLEADOS
								        $model = new Ventas ();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->ReporteVentasSanRafa111s($_REQUEST['Inicio'],$_REQUEST['Sucursal'],$_REQUEST['Turnos']) as $r): 
								         ?>
											<tr>
												<td> 
													<input type="text" id="CodigoBarra" name="CodigoBarra" class="form-control" disabled="true" value="<?php echo $r->NombreCompleto; ?>">
                                        		</td>
												<td> 
													<input type="text" id="CodigoBarra" name="CodigoBarra" class="form-control" disabled="true" value="<?php echo $r->Total; ?>">
                                        		</td>
                                        		<td>
													<input type="text" id="Id" name="Id" class="form-control" disabled="true" value="<?php echo $r->Bono; ?>">
												</td>
												<td>
													<input type="text" id="CodigoBarra" name="CodigoBarra" class="form-control" disabled="true" value="<?php echo $r->Descuento; ?>">
												</td>
												<td>
													<input type="text" id="Id" name="Id" class="form-control" disabled="true" value="<?php echo $r->TotalCobrado; ?>">
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



			<div class="mdl-tabs__panel" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles" style="background-color: #4B0082">
								Listado de Salidas
							</div>
			                <div class="full-width divider-menu-h"></div>
			                <form method="post">
						<div class="row table-responsive">
							<table class="table table-bordered table-hover display" class="table table-striped" id="TableUsers">
								<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
									<tr>
										<th>Codigo</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Nombre-Dependiente</th>
										<th>Total-Venta</th>
										<th>Bono-Venta</th>
										<th>Descuento-Venta</th>
										<th>Total-Cobrado</th>
										<th style="width: 50px;"><center>Info</center></th>
									</tr>
								</thead>
								<tbody>
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS
								        $model = new Ventas ();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->ReporteVentasSanRafa1s($_REQUEST['Inicio'],$_REQUEST['Sucursal'],$_REQUEST['Turnos']) as $r): 
								    ?>
						            <tr>
						            	<td><?php echo $r->Codigo; ?></td>
						                <td><?php echo $r->Fecha; ?></td>
						                <td><?php echo $r->Hora; ?></td>
						                <td><?php echo $r->NombreCompleto; ?></td>
						                <td><?php echo $r->Total; ?></td>
						                <td><?php echo $r->Bono; ?></td>
						                <td><?php echo $r->Descuento; ?></td>
						                <td><?php echo $r->Total1; ?></td>
						                <td><center>
						                 <?
                                         $ProductoVenta = $r->Codigo;
                                         echo '<a href="#" data-toggle="modal" data-target="#infoProduct12" onclick="DataProduct456('.$ProductoVenta.')"><i class="fa fa-eye"></i></a>';
                                         ?>
										</center></td>
						            </tr>

						        	<?php endforeach; //FIN PHP PRINCIPAL ?> 					
								</tbody>
							</table>
						</div></form>
						</div> 
					</div>
				</div>
		</div>
		</div>
						
	</section>






     <div class="modal fade" id="infoProduct12" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i> Detalle de factura</h4>
            </div>

            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                        	
								<table id="tablejson" class="table">
							    <tr>
							        <th>Nombre</th>
							        <th>SubTotal</th>

							    </tr>
							</table> 
	                            
	                          

                                <div class="modal-footer editProductPhotoFooter">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
                                </div>  <!-- /modal-footer -->
                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>



	<script>
		


       function DataProduct456(ProductoVenta) 
        {   
		    if (ProductoVenta) 
		    {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=DetalleFactura',
		            type: 'post',
		            data: {ProductoVenta: ProductoVenta},
		            dataType: 'json',
		            success:function(response) {  
		            console.log(response); 
		            if(response){

	                var len = response.length;
	                var txt = "";
	                if(len > 0){
	                    for(var i=0;i<len;i++){
	                        if(response[i].NombreProducto && response[i].SubTotal){
	                            txt += "<tr><td>"+response[i].NombreProducto+"</td>"+"<td>"+response[i].Cantidad+"</td>"+"<td>"+response[i].PrecioCosto+"</td>"+"<td>"+response[i].SubTotal+"</td></tr>";
	                        }
	                    }
	                    if(txt != ""){
	                    	$("#tablejson").empty();
	                    	$("#tablejson").append("<thead><th>Producto</th><th>Cantidad</th><th>Precio</th><th>SubTotal</th></thead>");
	                        $("#tablejson").append(txt).removeClass("hidden");
	                    }
	                }
	            }  
		            	
		           
		        } //success function

	        })// /ajax to fetch product image

	        }
	        else{
	            alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> No hay detalle</font> ');
	        }
    	}



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
		                $("#FechaVencimientoC").val(response.FechaVencimiento);
               			$("#PoliticaC").val(response.Politica);

               			$('#SelectDescuentos').empty();

		                $("#SelectDescuentos").append('<option>' + response.Desc1 + '%' + "</option>");
		                $("#SelectDescuentos").append('<option>' + response.Desc2 + '%' + "</option>");
		                $("#SelectDescuentos").append('<option>' + response.Desc3 + '%' + "</option>");
		                $("#SelectDescuentos").append('<option>' + response.Desc4 + '%' + "</option>");
		                $("#SelectDescuentos").append('<option>' + response.Desc5 + '%' + "</option>");
		                $("#SelectDescuentos").append('<option>' + response.Desc6 + '%' + "</option>"); 
		        } //success function

	        })// /ajax to fetch product image

	        }
	        else{
	            alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Primero seleccione un producto de inventario</font> ');
	        }
    	}

        //AL SELECCIONAR UN PRODUCTO DEVOLVER LA INFORMACION

        $('select[name=cbo_producto]').change(function()
        {
        	var IdProd = $('#cbo_producto').val();
        	DataProduct_2(IdProd);
        });


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


		

        function DataFacture(productId) 
        {
		    if (productId) {
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
		                $("#FechaVencimientoC").val(response.FechaVencimiento);
               			$("#PoliticaC").val(response.Politica);
		            } //success function

		        })// /ajax to fetch product image

	        }else{
	            alert("ERROR AL Mostrar DATOS");
	        }
    	}

    	// SCRIPT PARA ACTIVAR EL MODAL AL MOMENTO DE PRECIONAR EL BOTON CONFIRMAR ELIMINACION -->

   
       var Code;


		//Eliminar Producto
		function removeProduct(productId) {
			setCode(productId);
			//alert(productId);
		} 


		function getCode ()
		{
			return Code;
		}

		function setCode (Cod)
		{
			Code = Cod;
		}
          
   
    </script>
</body>
</html>