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
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="fa fa-cube"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					LISTADO DE PRODUCTOS EN INVENTARIO FARMACIA SAN RAFAEL #1
				</p>

                <br></br><br></br><br></br>
               <!-- <a href="index.php?view=Option&Codigo=26"  class="btn btn-default" style="width: 150px; background-color: #E6E6E6;"><i class="fa fa-download"></i>  Reporte excel</a> -->
           
               <a href="index.php?view=Option&Codigo=14"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;"><i class="fa fa-download"></i> Reporte PDF</a>
			</div>
		</section>

		<div class="mdl-tabs__panel is-active" id="tabListAdmin">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-success text-center tittles">
							Listado de Productos
						</div>
						<div class="full-width panel-content">

						<div class="full-width divider-menu-h"></div>
							<div class="row table-responsive">
							<table class="display" id="TablaProductos" class="table table-striped">
								<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
									<tr>
										<th>Id</th>
										<th>CodigoBarra</th>
										<th>Medicamento</th>
										<th>Existencia</th>
										<th>PrecioVenta</th>
                                        <th>PrecioTope</th>
										<th>Categoria</th>
                                        <th>Casa</th>
                                        <th>Marca</th>
										<th>info</th>
										<th>Agregar</th>
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
                                
                                <h5><font color="BLUE"> Politica y Fecha de vencimiento. </font></h5>

                                <hr></hr>
                                <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Vencimiento</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <input type="date" class="form-control" id="FechaVencimientoC"  name="FechaVencimientoC" disabled="true" autocomplete="off">
                                        </div>
                                </div> <!-- /form-group-->

                                 <br></br>

                                <div class="form-group">
                                    <label for="idProductName" class="col-sm-3 control-label">Politica</label>
                                    <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control" id="PoliticaC"  name="PoliticaC" disabled="true" autocomplete="off"></textarea>
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
                                <h5><font color="BLUE"> Descuentos: </font></h5>
                                <hr></hr>
                                <br></br>
                         
                               
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <label for="idProductName" class="col-sm-3 control-label">Descuentos</label>
                                    <label class="col-sm-1 control-label">: </label>
                                    <div class="col-sm-3">
                                        <select id="SelectDescuentos" id="SelectDescuentos" class="form-control col-sm-3">
                                            
                                        </select>
                                    </div>
                                </div>

                            </form><!--form-->
                        </div> <!-- /product info -->
                    </div><!--End tab panels-->
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>


<!-- 
    <div class="modal fade" id="ingresos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title font-weight-bold">Ingreso de Existencias</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="fname">Cantidad de producto a ingresar:</label>
                    <br></br>
                   
                    <div class="col-md-4">
                        <input type="text" id="Code" class="form-control validate" readonly="">
                        <br></br>
                        <input type="text" id="Cant" class="form-control validate">
                    </div>
                    
                    <br></br>
                    <br></br>
                    <br></br>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="send" class="btn btn-info">Entrada <i class="fa fa-paper-plane-o ml-1"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div> -->

<script type="text/javascript">

function IngresarProducto(productId) 
    {
        $('#Code').val(productId);
    }

    $('#ingresos').on('click', '.btn-info', function(e)
    {
        var CodigoProducto = $('#Code').val();
        var CantidadEntrada = $('#Cant').val();


        if (CantidadEntrada == '')
        {
            alert('Por favor indica la Cantidad');
        }
        else
        {
            $.post("index.php?view=AddExistencia",
            { 
                'CodigoProducto':CodigoProducto,'CantidadEntrada':CantidadEntrada
            },
            function(response,status)
            { 
                alert('Entrada Exitosa');
                window.location.reload();
            });
        }
   });



     var objetoDataTables_personal = $('#TablaProductos').DataTable({
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
            "sAjaxSource":              "index.php?view=FetchInventorySanRafa1",
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
                {"data": 9},
                {"data": 10}
            ],
        });
        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm'); 

        function DataProduct(productId) {

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
</body>