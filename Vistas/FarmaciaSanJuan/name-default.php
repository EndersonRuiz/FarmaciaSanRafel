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
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nueva Venta</a>
				<a href="#tabListAdmin" class="mdl-tabs__tab">Ver ventas</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles" style="background-color: #FFA500">
								Salidas de Productos Farmacia San Juan
							</div>

							<div class="full-width panel-content">
								<div class="row">
                                    <h5>Producto:</h5>
                                   
                                   <select class="col-md-4 select-box" id="cbo_producto" name="cbo_producto">
                                        <option >
                                           
                                        </option>
                                   </select>

                                   <button  class="btn btn-primary" style="background-color: #1E90FF " onclick="insertarDatos2()" data-target="#modalContactForm1" data-toggle="modal">
                                        <i class="glyphicon glyphicon-shopping-cart" ></i> ++++
                                   </button>

                                   <button  class="btn btn-primary" style="background-color: #1E90FF " onclick="insertarDatos1()" data-target="#modalContactForm2" data-toggle="modal">
                                        <i class="glyphicon glyphicon-shopping-cart" ></i> - - - -
                                   </button>
                                   <br></br>
                                </div>


							 <div class="full-width divider-menu-h"></div>
								<div class="row table-responsive">
									<table class="table table-bordered table-hover" class="table table-striped" >
										<thead class="bg-primary">
											<tr style="background-color: #FFA500;">
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
													<button type="submit" class="btn btn-primary" id="AgregarAFactura" style="background-color: #1E90FF ">
                                            			<i class="glyphicon glyphicon-shopping-cart" ></i> Salida
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
											 if(count($_SESSION['DetalleSanJuan'])>0){?>
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
												    	foreach($_SESSION['DetalleSanJuan'] as $k => $detalle){
												    	?>
												        <tr>
												        	<td><?php echo $detalle['id'];?></td>
												            <td><?php echo $detalle['producto']."(".$detalle['sucursal'].")";?></td>
												            <td><?php echo $detalle['cantidad'];?></td>
												            <td><?php echo $detalle['precio'];?></td>
												            <td><?php echo $detalle['subtotal'];?></td>
												            <td><button type="button" class="btn btn-sm eliminar-producto" style="background-color: #1E90FF " id="<?php echo $detalle['id'];?>">Eliminar</button></td>
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
									<div class="col-md-2 text-right">
										<button  class="btn btn-primary" style="background-color: #1E90FF " onclick="DatosVacios()" data-target="#modalContactForm3" data-toggle="modal">
                                        <i class="fa fa-folder-open" ></i> Agregar a Caja
                                         </button>
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
								        $model = new VentasSanJuan ();
								        //CARGAR LOS CAMPOS A LA VARIABLE $r
								        foreach($model->ListarVentas() as $r): 
								    ?>
						            <tr>
						            	<td><?php echo $r->Codigo; ?></td>
						                <td><?php echo $r->Fecha; ?></td>
						                <td><?php echo $r->Hora; ?></td>
						                <td><?php echo $r->NombreCompleto; ?></td>
						                <td><?php echo $r->Total; ?></td>
						                <td><?php echo $r->Bono; ?></td>
						                <td><?php echo $r->descuento; ?></td>
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


	<!-- MENU PARA VER LOS DATOS COMPLETOS DEL PRODUCTO -->

    <div class="modal fade" id="infoProduct" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i> Datos del producto</h4>
            </div>

            <div class="modal-body" style="max-height:450px; overflow:auto;">
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



    <div class="modal fade" id="modalContactForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Nuevo Total ++</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Total + al del Sistema:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                    	<div class="col-md-4">
						  <label >Total a Pagar</label>
        	              <input type="text" id="Total11" class="form-control" oninput="cal1()"
        	                readonly>
      	                </div>

						<div class="col-md-4">
						  <label >Total Bono</label>
        	              <input type="text"  id="Totaldesc1" class="form-control" oninput="cal1()">
      	                </div>


					   <div class="col-md-4">
						  <label >Bonificacion</label>
        	              <input type="text"  id="descuento1" class="form-control" readonly>
      	               </div>
					</div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
            	<button id="send" class="btn btn-info">
            	<a href="#" data-toggle="modal" data-target="#modalContactForm3" class="btn btn-primary" ><i class="fa fa-folder-open">Enviar a Caja</i></a> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
     </div>   


     <div class="modal fade" id="modalContactForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Nuevo Total --</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Total - al del Sistema:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

							<div class="col-md-4">
								<label >Total a Pagar</label>
        	                <input type="text"  id="Total1" class="form-control" oninput="cal()"
        	                readonly>
      	                    </div>

							<div class="col-md-4">
								<label >Total Desc</label>
        	                <input type="text"  id="Totaldesc" class="form-control" oninput="cal()">
      	                    </div>


							<div class="col-md-4">
							 <label >Descuento</label>
        	                <input type="text"  id="descuento" class="form-control" readonly>
      	                    </div>
      	                    
					</div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
            	<button id="send" class="btn btn-info">
            	<a href="#" data-toggle="modal" data-target="#modalContactForm3" class="btn btn-primary" ><i class="fa fa-folder-open">Enviar a Caja</i></a> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
     </div>   




     <div class="modal fade" id="modalContactForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Codigo del Dependiente</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Usuario</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

					    <div class="col-md-4">
        	            <input type="password" name="usuario1" id="usuario1" class="form-control" autofocus="">
      	                </div>
					</div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
            	<button id="send" class="btn btn-info guardar-carrito">
            	<a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Enviar</i></a> </button>
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
		//AUTOCOMPLETADOR O BUSCADOR AL SELECT


        $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteSanJuan&keyword=');

       //Resta Automatic DE mIS input
       function cal() {
        try {
        var a = parseFloat(document.getElementById("Total1").value) || 0,
            b = parseFloat(document.getElementById("Totaldesc").value) || 0;

              document.getElementById("descuento").value = a - b;
              document.getElementById("descuento1").value = '';
              document.getElementById("Totaldesc1").value = '';
          }catch(e){}
       }

       function cal1() {
        try {
        var 
            c = parseFloat(document.getElementById("Total11").value) || 0,
            d = parseFloat(document.getElementById("Totaldesc1").value) || 0;

              document.getElementById("descuento1").value = d - c;
              document.getElementById("descuento").value = '';
              document.getElementById("Totaldesc").value = '';
              }catch(e){}
       }

       function insertarDatos1() {
		 	var dato = parseFloat(document.getElementById("datos1").value) || 0;

		 	document.getElementById("Total1").value = dato;
       }



       function insertarDatos2() {
		 	var dato = parseFloat(document.getElementById("datos1").value) || 0;

		 	document.getElementById("Total11").value = dato;
       }

       function DatosVacios(){
       	   document.getElementById("descuento").value = '';
       	   document.getElementById("descuento1").value = '';
       	   document.getElementById("Totaldesc1").value = '';
       	   document.getElementById("Totaldesc").value = '';
       }


       function DataProduct456(ProductoVenta) 
        {   
		    if (ProductoVenta) 
		    {
		        //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
		        $.ajax({
		            url: 'index.php?view=DetalleFacturaSanJuan',
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

        
        //ENVIAR DATOS SOBRE DETALLE COMPRA POR MEDIO DE AJAX JQUERY Y DEVOLVER CON PHP JSON
      

        $('#AgregarAFactura').unbind('click').bind('click', function(){
        	var Cod = $('#cbo_producto').val();
        	var Product = $('#Cantidad').val();
      
        	if (Cod == '' || Product == '')
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
	        }
	        else
	        {
	        	$.ajax({
					url: 'index.php?view=VerificaExistenciaSanJuan',
					type: 'post',
					data: {
						'Codigo':Cod,'Cant':Product
					},
					dataType: 'json',
					success: function(data) 
					{
						if(data.success==true)
						{
							alertify.success(data.msj);
							$(".detalle-producto").load('index.php?view=DetalleVentaSanJuan');
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
				url: 'index.php?view=DetalleVentaSanJuan',
				type: 'post',
				data: {'id':id},
				dataType: 'json'
			}).done(function(data)
			{
				if(data.success == true)
				{
					alertify.success(data.msj);
					$(".detalle-producto").load('index.php?view=DetalleVentaSanJuan');
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
			var User = $('#usuario1').val();
			var TotaldescMas = $('#Totaldesc1').val();
			var DescuentoMas = $('#descuento1').val();
			var TotaldescMenos = $('#Totaldesc').val();
			var DescuentoMenos = $('#descuento').val();
			if (User == '')
			{
				alertify.set('notifier','position','top-right');
	        	alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Indique el Usuario que realiza la venta</font> ');
			}
			else
			{  

				 $.ajax({
					url: 'index.php?view=AddDetalleVentaSanJuan',
					type: 'post',
					data: {'User':User,'TotaldescMas':TotaldescMas,'DescuentoMas':DescuentoMas,
					'TotaldescMenos':TotaldescMenos,'DescuentoMenos':DescuentoMenos},
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
							  	window.location.reload ('index.php?view=FarmaciaSanJuan');
							}, 1000);
						}
						else
						{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error)
					{
						alertify.set('notifier','position','top-right');
	        	        alertify.error('<font color="#fffff"><i class="fa fa-times"></i> Codigo de Usuario no valido</font> ');
					}
				});
		
			}		
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