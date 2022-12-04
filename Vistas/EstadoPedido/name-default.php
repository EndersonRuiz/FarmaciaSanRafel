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
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Informacion del pedido
							</div>
							<div class="full-width panel-content">
								<form action="#!" method="post">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos del pedido</h5>
											<?
												$model = new Notifications();
												foreach($model->infoPedido($_REQUEST['Codigo']) as $r): 
											?>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->Codigo; ?>" class="mdl-textfield__input" type="text"  id="CodigoSirve" name="CodigoSirve" readonly >
												<label class="mdl-textfield__label" for="DNIAdmin">Codigo</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->Fecha; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Fecha</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->Hora; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Hora</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->Comentario; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Comentario</label>
											</div>

											<?
												$Estado;

												if ($r->Estado == '1')
												{
													$Estado = "No entregado o en camino";
												}
											?>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $Estado; ?>"  class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Estado</label>
											</div>

											<?
												endforeach;
											?>

											

										</div>

										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											
											<h5 class="text-condensedLight">Datos de quien Envia</h5>

											<?
												$model = new Notifications();
												foreach($model->Envia($_REQUEST['Codigo']) as $r): 
											?>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->PrimerNombre." ".$r->SegundoNombre." ".$r->PrimerApellido." ".$r->SegundoApellido; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Usuario</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->Nombre; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Sucursal</label>
											</div>

											<?
												endforeach;
											?>

											<h5 class="text-condensedLight">Datos de quien Recibe</h5>

											<?
												$model = new Notifications();
												foreach($model->Recibe($_REQUEST['Codigo']) as $r): 
											?>


											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->PrimerNombre." ".$r->SegundoNombre." ".$r->PrimerApellido." ".$r->SegundoApellido; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Usuario</label>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input value="<? echo $r->Nombre; ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo" readonly>
												<label class="mdl-textfield__label" for="DNIAdmin">Sucursal</label>
											</div>

											<?
												endforeach;
											?>

											
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											
											<h5 class="text-condensedLight">Productos en Pedido</h5>
												
											<div class="mdl-list">
												<?
													$model = new Notifications();
													foreach($model->DetallePedido($_REQUEST['Codigo']) as $r): 
												?>
												<div class="mdl-list__item mdl-list__item--two-line">
													<span class="mdl-list__item-primary-content">
														<i class="zmdi zmdi-case-check mdl-list__item-avatar"></i>
														<span><? echo "☜( Cantidad: ".$r->Cantidad.")☜     "; ?>

														<? echo $r->NombreProducto; ?></span>
													</span>
													<?
														$ProductId = $r->Codigo;

														echo '<a href="#" data-toggle="modal" data-target="#infoProduct" onclick="DataProduct('.$ProductId.')"><i class="fa fa-eye"></i></a>';
													?>
												</div>
												<?
													endforeach;
												?>
											</div>
										</div>
									</div><P></P><P></P>
									<p class="text-center">	
										USUARIO RECIBE<br></br>
										<div class="col-md-4"></div>
										<div class="col-md-4">
										<input class="class form-control" required="" name="cbo_usuario" id="cbo_usuario" placeholder="" type="password" autocomplete="off"><br></br> 
										<div class="text-center"> <button id="BotonCerrar" name="BotonCerrar" class="btn btn-info">
            	                     <a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Entrada Productos</i></a> </button></div>

										
										</div>
                                        <br></br>

                            

									</p>
								</form>
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


    $(function () {
    $BotonCobrar = $('#BotonCerrar');
     
    $BotonCobrar.on('click',onClickBotonCobrar);
   });

	function onClickBotonCobrar(){
        var Inicio = $('#cbo_usuario').val();
        var Codigo = $('#CodigoSirve').val();
		if (Inicio == '' || Codigo == '')
			{
				if (Inicio == '')
			    {
				     alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique El Usuario</font> ');
		      	}
		      	if (Codigo == '')
			    {
				     alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Favor Indique el Codigo</font> ');
		      	}
			}
			else
			{
                 $BotonCobrar.prop('disabled', true);
				 $.ajax({
					url: 'index.php?view=MarcarPedido',
					type: 'post',
					data: {'Inicio':Inicio,'Codigo':Codigo},
					dataType: 'json',
					success: function(data) 
					{
				      if(data.success==true)
                      {
                        alertify.success(data.msj);
                        setTimeout(function()
                        {
                          window.location = 'index.php?view=Notificaciones';
                        }, 1000);
                      }else
                          {
                          alertify.error(data.msj);  
                          }
					},
					error: function(jqXHR, textStatus, error)
					{
						window.location = 'index.php?view=EstadoPedido&Codigo='+Codigo;    
					}
				});
		
			}		
		}


    	//METODO PARA DEVOLVER AL MODAL TODOS LOS DATOS DE UN PRODUCTO EN INVENTARIO

		 function DataProduct(productId) 
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
    </script>
</body>
</html>