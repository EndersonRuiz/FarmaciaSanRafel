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
								Nueva Compra
							</div>
							<div class="full-width divider-menu-h"></div>
								<div class="row table-responsive">
									<div class="full-width panel-content">
										<div class="container">
									 		<div class="row">
									 			
												<div class="col-md-4">	
													<div>
														Producto:
		                                                  
	                                                    <select name="cbo_producto" id="cbo_producto" class="col-md-2 form-control select-box">
	                                                        <option>
	                                                           
	                                                        </option>
	                                                    </select>                                     
													</div>
												</div>

												<div class="col-sm-1">
													<div>Cod:
													  <input id="Codig" disabled="true" name="Codig" type="text" class="col-sm-2 form-control" placeholder="00.00" autocomplete="off" />
													</div>
												</div>

												<div class="col-sm-2">
													<div>Existencia:
													  <input id="StockV" disabled="true" name="StockV" type="text" class="col-sm-2 form-control" placeholder="00.00" autocomplete="off" />
													</div>
												</div>

												<div class="col-sm-3">
													<div>Laboratorio Producto:
													  <select class="col-md-2 form-control select-box" id="AutoVisitador" name="AutoVisitador" required="true">
													  	<option></option>
													  </select>
													</div>
												</div>

											

											</div>
											
											<hr>
											<div class="row" style="margin-top: 19px;">


												<div class="col-md-2">
													<div>Cantidad Producto:
													  <input id="Cantidad" required="true" name="Cantidad" type="text" class="col-md-2 form-control" placeholder="0" autocomplete="off" />
													</div>
												</div>
												<div class="col-sm-2">
													<div>Producto Bonificado:
													  <input id="Bonific" required="true" name="Bonific" type="text" class="col-sm-2 form-control" placeholder="0" autocomplete="off" />
													</div>
												</div>

												<div class="col-sm-2">
													<div>Precio Costo:
													  <input id="FinalCost" name="FinalCost" type="text" class="col-sm-2 form-control" placeholder="00.00" autocomplete="off" />
													</div>
												</div>

												<div class="col-sm-2">
													<div>Precio Tope:
													  <input id="FinalTope" name="FinalTope" type="text" class="col-sm-2 form-control" placeholder="00.00" autocomplete="off" />
													</div>
												</div>

												<div class="col-sm-2">
													<div>Precio Venta:
													  <input id="FinalVenta" name="FinalVenta" type="text" class="col-sm-2 form-control" placeholder="00.00" autocomplete="off"/>
													</div>
												</div>
												
												
											</div>
											<hr>
											<div class="row" style="margin-top: 19px;">

												<div class="col-sm-3">
													<div>Fecha Vencimiento Pr.:
													  <input type="date" required="" id="FechaVencimiento" name="FechaVencimiento" class="mdl-textfield__input">
													</div>
												</div>

												<div class="col-sm-2">
													<div>No Factura:
													  <input id="NoFactura" name="NoFactura" type="text" class="col-sm-2 form-control" placeholder="F-00001" autocomplete="off" />
													</div>
												</div>

												<div class="col-sm-3">
													<div>Usuario:
													  <select class="col-md-2 form-control select-box" id="UsuarioCompra" name="UsuarioCompra">
													  	<option></option>
													  </select>
													</div>
												</div>

												<div class="col-sm-2">
													<div>Nombre Factura:
													  <input id="nota" name="nota" type="text" class="col-sm-2 form-control" placeholder="comentario" autocomplete="off" />
													</div>
												</div>

												
							
											</div>

											<hr>
											<div class="row" style="margin-top: 19px;">

												<div class="col-sm-3">
													<div>Fecha De La Factura:
													  <input type="date" required="" id="FechaFac1" name="FechaFac1" class="mdl-textfield__input">
													</div>
												</div>

												<div class="col-sm-5" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<div>Comentario Adicional:
													  <textarea class="mdl-textfield__input" style="height: 77px;" id="Descripcion" name="Descripcion" required=""></textarea>
													</div>
												</div>
							
											</div>

											<hr>
											<div class="row" style="margin-top: 19px;">

												

												<div class="col-md-3">
													<div style="margin-top: 19px;">
													<button  id="AgregarAFactura" class="btn btn-success btn-agregar-producto">Agregar a la factura</button>
													</div>
												</div>

												<div class="col-sm-2">
													<div style="margin-top: 19px;">
													<button  id="LimpiaCajas" class="btn btn-primary btn-limpiar">Limpiar</button>
													</div>
												</div>
							
											</div>
											<br>
											<br>
											
											
									</div>
								</div>             
							</div>



							<div class="full-width divider-menu-h"></div>
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
														 if(count($_SESSION['Detalle'])>0){?>
															<table class="table">
															    <thead>
															        <tr>
															        	<th>Id</th>
															            <th>Descripci&oacute;n</th>
															            <th>Cantidad</th>
															            <th>Subtotal</th>
															            <th>Total</th>
															            <th>Eliminar</th>
															        </tr>
															    </thead>
															    <tbody>
															    	<?php 
															    	foreach($_SESSION['Detalle'] as $k => $detalle){ 
															    	?>
															        <tr>
															        	<td><?php echo $detalle['id'];?></td>
															            <td><?php echo $detalle['producto'];?></td>
															            <td><?php echo $detalle['cant'];?></td>
															            <td><?php echo $detalle['precioc'];?></td>
															             <td><?php echo $detalle['totall'];?></td>
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
														<button type="button" class="btn btn-sm btn-default guardar-carrito">Guardar</button>
													</div>
												</div>
											</div>
									</div>           
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
										<th>Cod.</th>
										<th>FechaFac.</th>
										<th>FechaReg.</th>
										<th>Hora</th>
										<th>NumeroFactura</th>
										<th>Laboratorio</th>
										<th>NombreUsuario</th>
										<th>Total</th>
										<th style="width: 50px;"><center>Det.</center></th>
										<th style="width: 50px;"><center>Descrip.</center></th>
									</tr>
								</thead>
								<tbody>
									<?
										//INSTANCIA DE LA CLASE EMPLEADOS
								        $model = new Compras();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->BuscarCompras() as $r): 
								    ?>
						            <tr>
						            	<td><?php echo $r->Codigo; ?></td>
						                <td><?php echo $r->FechaFac1; ?></td>
						                <td><?php echo $r->Fecha; ?></td>
						                <td><?php echo $r->Hora; ?></td>
						                <td><?php echo $r->NumeroFactura; ?></td>
						                <td><?php echo $r->Laboratorio; ?></td>
						                <td><?php echo $r->NombreUsuario; ?></td>
						                <td><?php echo $r->Total; ?></td>
						                <td><center>
						                 <?
                                         $ProductoVenta = $r->Codigo;
                                         echo '<a href="#" data-toggle="modal" data-target="#infoProduct12" onclick="DataProduct456('.$ProductoVenta.')"><i class="fa fa-eye"></i></a>';
                                         ?>
										</center></td>
										<td><center>
                                         <?
										  echo '<a href="#" data-toggle="modal" data-target="#modalContactForm" onclick="DataProduct_3('.$ProductoVenta.')" class="btn btn-primary"><i class="fa fa-folder-open">Comentario</i></a>'
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

	</section>
	

	<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Comentario De la Factura</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Descripcion Detallada:</label>
                    <textarea class="mdl-textfield__input" style="height: 77px;" id="Descripc" name="Descripc" required=""></textarea>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
     </div> 


     <div class="modal fade" id="infoProduct12" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i> Detalle de factura</h4>
                <div class="col-sm-2">
					<div>NumeroFactura:
					<input id="NumeroFacturaa" name="NumeroFacturaa" type="text" class="col-sm-2 form-control" disabled="true" autocomplete="off" />
					</div>
				</div>
               
				<div class="col-sm-2">
					<div>Laboratorio:
					<input id="Laboratorio1" name="Laboratorio1" type="text" class="col-sm-2 form-control" disabled="true" autocomplete="off" />
					</div>
				</div>
				<div class="col-sm-2">
					<div>Total Q:
					<input id="Total2" name="Total2" type="text" class="col-sm-2 form-control" disabled="true" autocomplete="off" />
					</div>
				</div>
            </div>


            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                        	  <table id="tablejson" class="table">
							    <tr>
							        <th>Id</th>
							        <th>NombreCompleto</th>
							        <th>Cant</th>
							        <th>Bonif.</th>
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


	<script type="text/javascript">
       	//SCRIPTS PARA LOS AUTOCOMPLETADORES DE TEXTO

        $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteCompras&keyword=');

        $('#UsuarioCompra').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('UsuarioCompra', 'index.php?view=AutoCompleteUsers&keyword=');

        $('#AutoVisitador').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('AutoVisitador', 'index.php?view=AutocompleteLaboratories&keyword=');



        function DataProduct456(ProductoVenta) 
        {   
		    if (ProductoVenta) 
		    {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=ResCompra',
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
	                        if(response[i].Codigo && response[i].Bonificacion){
	                        	$("#NumeroFacturaa").val(response[i].NumeroFactura);
	                        	$("#Laboratorio1").val(response[i].Laboratorio);
	                        	$("#Total2").val(response[i].Total);
	                            txt += "<tr><td>"+response[i].Codigo+"</td>"+"<td>"+response[i].NombreProducto+"</td>"+"<td>"+response[i].Cantidad+"</td>"+"<td>"+response[i].Bonificacion+"</td>"+"<td>"+response[i].PrecioCosto+"</td>"+"<td>"+response[i].PrecioTope+"</td>"+"<td>"+response[i].PrecioVenta+"</td>"+"<td>"+response[i].FechaVencimiento+"</td></tr>";
	                        }
	                    }
	                    if(txt != ""){
	                    	$("#tablejson").empty();
	                    	$("#tablejson").append("<thead><th>Id</th><th>NombreCompleto</th><th>Cant</th><th>Bonif</th><th>PrecioC</th><th>PrecioT</th><th>PrecioV</th><th>FechaVen</th></thead>");
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


        //SCRIPT PARA ACTUALIZAR EL LABORATORIO A UN PRODUCTO

        $('select[name=AutoVisitador]').change(function()
        {
        	var Inventari = $('#cbo_producto').val();
        	
        	if (Inventari == '')
        	{
        		alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Primero seleccione el producto</font> ');
        	}
        	else
        	{
	        	var Intem = $('#AutoVisitador').val();

	        	$.post("index.php?view=UptateLabInve", 
	            {
	                'IdLaboratorio':Intem,'IdInventario':Inventari
	            },
				function(response,status)
				{ 
	             	alertify.set('notifier','position','top-right');
		        	alertify.success('<font color="#fffff"><i class="fa fa-check"></i>Laboratorio actualizado</font> '+response);
	          	});
		    }
        });

        function DataProduct_3(productId) {
		    if (productId) {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=ResCompra1',
		            type: 'post',
		            data: {productId: productId},
		            dataType: 'json',
		            success:function(response) { 
		                $("#Descripc").val(response.Descripcion);
		        } //success function

	        })// /ajax to fetch product image

	        }else{
	            alert("ERROR AL Mostrar DATOS");
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
		                $("#FinalVenta").val(response.PrecioVenta);
		                $("#FinalCost").val(response.PrecioCosto);
		                $("#FinalTope").val(response.PrecioTope);
		                $("#StockV").val(response.Existencia);
		                $("#Codig").val(response.CodigoProducto);
		        } //success function

	        })// /ajax to fetch product image

	        }else{
	            alert("ERROR AL Mostrar DATOS");
	        }

	    }

	    //SCRIPT PARA DEVOLVER LOS DATOS EN UN MODAL EN BASE AL PRODUCTO FILTRADO

        $('select[name=cbo_producto]').change(function()
        {
        	var IdProd = $('#cbo_producto').val();
        	DataProduct_2(IdProd);
        });



        //METOTO PARA LIMPIAR LOS CAMPOS LUEGO DE INSERTAR UN REGISTRO

        function Limpiar()
        {
        	$('#cbo_producto').val ('');
        	$('#Cantidad').val ('');
        	$('#Bonific').val ('');
        	$('#FinalCost').val ('');
        	$('#FinalTope').val ('');
        	$('#FinalVenta').val ('');
        	$('#FechaVencimiento').val ('');
        	$('#StockV').val ('');
        	$('#SucurV').val ('');
        	$('#Codig').val ('');
        	$('#AutoVisitador').val ('');
        }

        //ENVIAR DATOS SOBRE DETALLE COMPRA POR MEDIO DE AJAX JQUERY Y DEVOLVER CON PHP JSON

        $('#AgregarAFactura').unbind('click').bind('click', function(){
        	var Product = $('#cbo_producto').val();
        	var Cant = $('#Cantidad').val ();
        	var CantBoni = $('#Bonific').val ();
        	var FinalCo = $('#FinalCost').val ();
        	var FinalTop = $('#FinalTope').val ();
        	var FinalVent = $('#FinalVenta').val ();
        	var Vencimiento = $('#FechaVencimiento').val ();
        	var Existenci = $('#StockV').val();
        	var Codd = $('#Codig').val();
        	var NoFactur = $('#NoFactura').val();
        	var UsuarioCompr = $('#UsuarioCompra').val();
        	var not = $('#nota').val();
        	var Factura1 = $('#FechaFac1').val();
        	var Descrip = $('#Descripcion').val();


        	if (Product == '' || Cant == ''|| CantBoni == '' || FinalCo == '' || FinalTop == '' || FinalVent == '' || Vencimiento == '' || Existenci == '' || Codd == '' || Factura1 == '')
	       	{
	        	 if (Product == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Seleccione un producto</font> ');
	        	 }
	        	 if (Cant == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Seleccione la Cantidad Lista</font> ');
	        	 }
	        	 if (CantBoni == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Seleccione la Cantidad Bonificado</font> ');
	        	 }
	        	 if (FinalCo == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique Precio Costo</font> ');
	        	 }
	        	 if (FinalTop == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique Precio Tope</font> ');
	        	 }
	        	 if (FinalVent == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique Precio Venta</font> ');
	        	 }
	        	 if (Vencimiento == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique Fecha Vencimiento</font> ');
	        	 }
	        	 if (Existenci == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique la Existencia</font> ');
	        	 }
	        	 if (Codd == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique el Codigo</font> ');
	        	 }
	        	 if (Factura1 == '')
	        	 {
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique la Fecha de la Factura</font> ');
	        	 }
	        }
	        else
	        {
	        	$.ajax({
					url: 'index.php?view=Detalle',
					type: 'post',
					data: {
						'IdInventario':Product,'Cantidad':Cant,'Bonificacion':CantBoni,'PrecioCosto':FinalCo,'PrecioTope':FinalTop,'PrecioVenta':FinalVent,'FechaVencimiento':Vencimiento,'Existencia':Existenci,'IdProducto':Codd,'NumeroFactura':NoFactur,'IdUsuario':UsuarioCompr,'Laboratorio':not,'FechaFac1':Factura1,'Descripcion':Descrip
					},
					dataType: 'json',
					success: function(data) 
					{
						if(data.success==true)
						{
							alertify.success(data.msj);
							$(".detalle-producto").load('index.php?view=DetalleCompra');
							Limpiar();
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

		//SCRIPT PARA ACTIVAR EL BOTON LIMPIAR

		$('#LimpiaCajas').unbind('click').bind('click', function(){
			window.location.reload ('index.php?view=Purchases');
		});

		//SCRIPT PARA QUITAR UN ELEMENTO DE LA LISTA

		$(".eliminar-producto").off("click");
		$(".eliminar-producto").on("click", function(e) 
		{
			var id = $(this).attr("id");
			$.ajax({
				url: 'index.php?view=EliminarDetalle',
				type: 'post',
				data: {'id':id},
				dataType: 'json'
			}).done(function(data)
			{
				if(data.success == true)
				{
					alertify.success(data.msj);
					$(".detalle-producto").load('index.php?view=DetalleCompra');
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
				url: 'index.php?view=AddDetalleCompra',
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
						  	//window.location.href = 'impresion.php?id='+data.idventa;
						  	window.location.reload ('index.php?view=Purchases');
						}, 2000);
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
	
	</script>

</body>
</html>