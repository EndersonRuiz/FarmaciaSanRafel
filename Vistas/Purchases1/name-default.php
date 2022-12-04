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
				<a href="#tabListAdmin" class="mdl-tabs__tab is-active">Ver Registros</a>
			</div>
			<!--clase donde se Registra al Usuario-->
			

        <div class="mdl-tabs__panel is-active" id="tabListAdmin">
                <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                            <div class="full-width panel mdl-shadow--2dp">
                                <div class="full-width panel-tittle bg-success text-center tittles">
                                        Listado de Facturas
                                </div>
                                <div class="full-width panel-content"></div>                       <div class="full-width divider-menu-h"></div>
                                        <div class="row table-responsive">
                                           <table class="table table-bordered table-hover display" class="table table-striped" id="miTabla_1">
                                                <thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>FechaFac1</th>
                                                        <th>Fecha</th>
                                                        <th>Hora</th>
                                                        <th>NumeroFactura</th>
                                                        <th>Laboratorio</th>
                                                        <th>NombreUsuario</th>
                                                        <th>Total</th>
                                                        <th>Modificar</th>
                                                        <th>Eliminar</th>
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
            "sAjaxSource":              "index.php?view=FetchCompras",
            "columns" : [
                {"data": 0},
                {"data": 1},
                {"data": 2},
                {"data": 3}, 
                {"data": 4},
                {"data": 5},
                {"data": 6},
                {"data": 7},
                {"data": 8},
                {"data": 9} 
            ],
        });
   $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
	
	</script>

</body>
</html>