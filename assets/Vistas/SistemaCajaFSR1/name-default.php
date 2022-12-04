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
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop text-center">
					Tus Clientes no compran tu producto o tu servicio. 
					Compran la emocion que les haces sentir y el significado que 
					tiene para ellos tener algo de tu marca...  
				</p>
			</div>
		</section>

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles" style="background-color: #4B0082">
								Sistema de Caja Farmacia San Rafael 1
							</div>
							<div class="full-width panel-tittle text-center tittles" style="background-color: #4B0082">
						             <button id="send" class="btn btn-info">
            	             <a href="#" data-toggle="modal" data-target="#modalContactForm3" class="btn btn-primary" ><i class="fa fa-folder-open">Abrir Caja FSR1</i></a> 
            	           </button>

            	           <button id="send" class="btn btn-info">
            	             <a href="#" data-toggle="modal" data-target="#modalContactForm4" class="btn btn-primary" ><i class="fa fa-folder-open">Salidas Efectivo FSR1</i></a> 
            	           </button>

            	           <button id="send" class="btn btn-info">
            	             <a href="index.php?view=SistemaCajaFSR1" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Ventas FSR1</i></a> 
            	           </button>

            	           <button id="send" class="btn btn-info">
            	             <a href="#" data-toggle="modal" data-target="#modalContactForm6" class="btn btn-primary" ><i class="fa fa-folder-open">Cerrar Caja FSR1</i></a> 
            	           </button>
				
							</div>


					   <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
					   <div class="mdl-grid">
					   <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
								<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle text-center tittles" style="background-color: #4B0082">
								Listado de salidas San Rafael 1
							   </div>
							<div class="full-width panel-content">

								<?
									//INSTANCIAR LA CLASE EMPLEADOS
							        $model = new Ventas();

							        //CARGARLOS RESULTADOS A LA VARIABLE $r
							        foreach($model->Listar() as $r):							   
								 ?>

								<div class="mdl-list">
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-account mdl-list__item-avatar"></i>
											
											<span><?echo "".$r->Codigo." →   Total a Cobrar(".$r->Total1.")";?></span>
											<span class="mdl-list__item-sub-title">
												<?
													echo "(".$r->Fecha.")        (".$r->Hora.")";
												?>
											</span>
											<span class="mdl-list__item-sub-title">
												<label style="text-decoration-color: red"><?
													echo $r->NombreCompleto;
												?></label>
											</span>
											<p></p><p></p>
										</span>

										<span class="mdl-list__item-primary-content">
                      <?
                            $ProductoVenta = $r->Codigo;

                            echo '<a href="#" data-toggle="modal" data-target="#modalContactForm7" class="btn btn-primary" ><i class="fa fa-folder-open" onclick="EnviarCodigo('.$ProductoVenta.')">Cobrar</i></a> ';
                      ?>

                      <?
                            $ProductoVent = $r->Codigo;

                            echo '<a href="#" data-toggle="modal" data-target="#modalContactForm10" class="btn btn-danger" ><i onclick="EnviarCodigo1('.$ProductoVent.')">Eliminar</i></a>';
                      ?>

                      <?
                             $ProductoVenta = $r->Codigo;
                            echo '<a href="#" data-toggle="modal" data-target="#infoProduct1231" onclick="DataProduct456('.$ProductoVenta.')"><i class="fa fa-eye"></i></a>';
                      ?>

										</span>
									</div>
									<?php endforeach; 
									//FIN PHP PRINCIPAL ?> 	
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
		</div>
	</section>
</body>

<div class="modal fade" id="modalContactForm10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Farmacia San Rafael 1</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <i class="fa fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="fname">Quitar Producto de La Lista</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <div class="col-md-4">
              <label >Codigo</label>
                        <input type="text" class="form-control" id="CodigoVenta1"  name=" CodigoVenta1" autocomplete="off" disabled="true">
                        </div>
          </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button id="BotonQuitar" class="BotonQuitar" class="btn btn-info guardar-carritoss">
              <a href="#" data-toggle="modal" class="btn btn-primary" ><i>Quitar</i></a> </button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="modalContactForm7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Farmacia San Rafael 1</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Caja Cobro</label><div class="col-md-2">
                        <input type="text" class="form-control" id="CodigoCaja"  name=" CodigoCaja" autocomplete="off" disabled="true">
                        </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <div class="col-md-2">
              <label >Codigo</label>
                        <input type="text" class="form-control" id="CodigoVenta"  name=" CodigoVenta" autocomplete="off" disabled="true">
                        </div>
                    	<div class="col-md-3">
						  <label >Total A pagar</label>
        	              <input type="text" class="form-control" id="TotalPagar"  name="TotalPagar" autocomplete="off" oninput="calculoCambio()" disabled="true">
      	                </div>

                        <div class="col-md-3">
						  <label >Monto Rec..</label>
        	              <input type="text" class="form-control" id="MontoRecibido"  name="MontoRecibido" autocomplete="off" oninput="calculoCambio()">
      	                </div>
                    	
					    <div class="col-md-3">
						  <label >Cambio</label>
        	              <input type="text" id="CambioCliente" name="CambioCliente" class="form-control" disabled="true" autocomplete="off">
      	                </div>
					</div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            	<button id="BotonCobrar" name="BotonCobrar" class="btn btn-info">
            	<a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Cobrar</i></a> </button>
            	<button id="send" class="btn btn-info">
            	<a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Factura</i></a> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="modalContactForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Farmacia San Rafael 1</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Apertura de Caja Farmacia San Rafael 1</label>
                        <?
                  //INSTANCIAR LA CLASE EMPLEADOS
                      $model = new Ventas();

                      //CARGARLOS RESULTADOS A LA VARIABLE $r
                      foreach($model->ExtraerDatosCaja() as $r):                
                      ?>
                        <div class="col-md-2">
                        <input type="text" id="EstadoCajaAbrir" class="form-control" disabled="true" value="<?echo $r->Estado?>">
                        </div>
                        <?php endforeach; 
                  //FIN PHP PRINCIPAL ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                        <div class="col-md-4">
						             <label >Codigo Usuario</label>
        	              <input type="password" id="usuario" class="form-control">
      	                </div>
                    	
					               <div class="col-md-4">
						             <label >Marco de Apertura</label>
        	              <input type="text" id="apertura" class="form-control">
      	                </div>

                          
                          <label >Turnos</label>
                          <select class="col-md-4 select-box" id="Turnoss" name="Turnoss">
                          <option>Turno Mañana</option>
                          <option>Turno Tarde</option>
                          </select>
					</div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            	<button id="BotonAbrir" name="BotonAbrir" class="btn btn-info">
            	<a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Abrir Caja</i></a> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="modalContactForm4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Farmacia San Rafael 1</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Salidas Efectivo 1</label>
                     <?
                  //INSTANCIAR LA CLASE EMPLEADOS
                      $model = new Ventas();

                      //CARGARLOS RESULTADOS A LA VARIABLE $r
                      foreach($model->ExtraerDatosCaja() as $r):                
                      ?>

                     <div class="col-md-2">
                        <input type="text" id="CodigoCajaa" namme="CodigoCajaa" class="form-control" disabled="true" value="<? echo $r->Codigo?>">
                        </div>
                      <div class="col-md-2">
                        <input type="text" id="CodigoEstado" name="CodigoEstado" class="form-control" disabled="true" value="<? echo $r->Estado?>">
                        </div>
                      <?php endforeach; 
                  //FIN PHP PRINCIPAL ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <div class="col-md-3">
						            <label >Monto Ef.</label>
        	              <input type="text" id="CantidadSalidaa" name="CantidadSalidaa" class="form-control">
      	                </div>  

					             <div class="col-md-6">
						            <label >Comentario</label>
        	              <input type="text" id="Comentarioo" name="Comentarioo" class="form-control">
      	                </div>
					          </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button id="BotonSalida" name="BotonSalida" class="btn btn-info">
              <a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Salida Efectivo</i></a> </button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="modalContactForm6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Cerrar Caja San Rafael 1</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                	 <div class="modal-body" style="max-height:350px; overflow:auto;">
                    <div class="div-result">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Hacer Corte del DIA</label>
                     <?
                  //INSTANCIAR LA CLASE EMPLEADOS
                      $model = new Ventas();

                      //CARGARLOS RESULTADOS A LA VARIABLE $r
                      foreach($model->ExtraerDatosCaja() as $r):                
                      ?>

                        <div class="col-md-2">
                        <input type="text" id="IdCaja" namme="IdCaja" class="form-control" disabled="true" value="<? echo $r->Codigo?>">
                        </div>
                        <div class="col-md-2">
                        <input type="text" id="IdEstado" namme="IdEstado" class="form-control" disabled="true" value="<? echo $r->Estado?>">
                        </div>
                      <?php endforeach; 
                  //FIN PHP PRINCIPAL ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text-center">
                    	<?
									//INSTANCIAR LA CLASE EMPLEADOS
							        $model = new Ventas();

							        //CARGARLOS RESULTADOS A LA VARIABLE $r
							        foreach($model->Listar1() as $r):							   
						          ?>

                         <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">Total Salidas Efectivo</label>
                           <div class="col-md-3">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Salidas1"  name="Salidas1"  autocomplete="off" oninput="calculoSuma()" disabled="true" value="<? echo $r->TotalSalidas; ?>">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 200.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete200"  name="Billete200" autocomplete="off" oninput="calculoMultiplicar()" required="true">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete201"  name="Billete201"  autocomplete="off" oninput="calculoSuma()" disabled="true">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 100.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete100"  name="Billete100" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete101"  name="Billete101"  autocomplete="off" oninput="calculoSuma()" disabled="true">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 50.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete50"  name="Billete50" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete51"  name="Billete51" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 20.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete20"  name="Billete20" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete21"  name="Billete21" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 10.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete10"  name="Billete10" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete11"  name="Billete11" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 5.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete5"  name="Billete5" autocomplete="off"oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete52"  name="Billete52" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">BILLETES Q. 1.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete1"  name="Billete1" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Billete12"  name="Billete12" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">MONEDAS Q. 1.00:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Moneda1"  name="Moneda1" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Moneda11"  name="Moneda2" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">MONEDAS Q. 0.50:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Moneda50"  name="Moneda50" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Moneda51"  name="Moneda51" disabled="true" autocomplete="off" oninput="calculoSuma()">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <label for="idProductName" class="col-sm-6 control-label">MONEDAS Q. 0.25:</label>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Moneda25"  name="Moneda25" autocomplete="off" oninput="calculoMultiplicar()" required="">
                           </div>
                           <div class="col-md-3">
                           <input type="text" class="form-control" id="Moneda26"  name="Moneda26" disabled="true" autocomplete="off" oninput="calculoSuma()" required="">
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                           <div class="col-md-8">
                           </div>
                           <div class="col-md-4">
                            <button type="button" class="btn btn-danger"  onclick="calculoSuma()">Sumar Efectivo</button>
                           </div>
                        </div> <br></br>

                        <div class="form-group">
                        	 <div class="col-md-6">
                           	Total Caja
                           <input type="text" class="form-control" id="idProductName"  name="idProductName" autocomplete="off" disabled="true" value="<? echo $r->Monto; ?>">
                           </div>
                           <div class="col-md-6">
                           	Total Efectivo
                           <input type="text" class="form-control" id="SumaEfectivo"  name="SumaEfectivo"  autocomplete="off" disabled="true">
                           </div>
                        </div> <br></br><br></br>
                    	<?php endforeach; 
									//FIN PHP PRINCIPAL ?>
					</div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            	<button id="BotonCerrar" naem="BotonCerrar" class="btn btn-info">
            	<a href="#" data-toggle="modal" class="btn btn-primary" ><i class="fa fa-folder-open">Cerrar Caja</i></a> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
           </div>
        </div>
    </div>
</div>  


<div class="modal fade" id="infoProduct1231" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
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

<script type="text/javascript">
   
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
                        $("#tablejson").append("<thead><th>Producto</th><th>Cantidad</th><th>Precio</th><th>SubTotal</th><th>Inf</th></thead>");
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

  function EnviarCodigo1(ProductoVenta) {
        if (ProductoVenta) {
            //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
            $.ajax({
                url: 'index.php?view=SistemaCaja1',
                type: 'post',
                data: {ProductoVenta: ProductoVenta},
                dataType: 'json',
                success:function(response) {       
                    $("#CodigoVenta1").val(response.Codigo);
            } //success function

          })// /ajax to fetch product image

          }else{
              alert("ERROR AL Mostrar DATOS");
          }

      }

  function EnviarCodigo(ProductoVenta) {
        if (ProductoVenta) {
            //MANDAR EL ID ELEGIDO MEDIANTE $.AJAX PARA PROCESAR LOS DATOS Y DEVOLVERLOS MEDIANTE JSON
            $.ajax({
                url: 'index.php?view=SistemaCaja1',
                type: 'post',
                data: {ProductoVenta: ProductoVenta},
                dataType: 'json',
                success:function(response) {      
                    $("#CodigoCaja").val(response.CodigoCaja);  
                    $("#CodigoVenta").val(response.Codigo);
                    $("#TotalPagar").val(response.Total1);
            } //success function

          })// /ajax to fetch product image

          }else{
              alert("ERROR AL Mostrar DATOS");
          }

      }

	function calculoCambio(){
        try{
           var a2 = parseFloat(document.getElementById('TotalPagar').value) || 0,
               b2 = parseFloat(document.getElementById('MontoRecibido').value) || 0;
           
               	document.getElementById('CambioCliente').value = (b2 - a2 );
        }catch(e){}
	}

	

	function calculoSuma(){
        try{
           var m1 = parseFloat(document.getElementById('Salidas1').value) || 0,
               a1 = parseFloat(document.getElementById('Billete201').value) || 0,
               b1 = parseFloat(document.getElementById('Billete101').value) || 0,
                c1 = parseFloat(document.getElementById('Billete51').value) || 0,
               d1 = parseFloat(document.getElementById('Billete21').value) || 0,
               e1 = parseFloat(document.getElementById('Billete11').value) || 0,
               f1 = parseFloat(document.getElementById('Billete52').value) || 0,
               g1 = parseFloat(document.getElementById('Billete12').value) || 0,
               h1 = parseFloat(document.getElementById('Moneda11').value) || 0,
               i1 = parseFloat(document.getElementById('Moneda51').value) || 0,
               j1 = parseFloat(document.getElementById('Moneda26').value) || 0;
               var resultado = document.getElementById('SumaEfectivo').value = (a1 + b1 + c1 + d1 + e1 + f1 + g1 + h1 + i1 + j1 + m1);
           
        }catch(e){}
	}

	function calculoMultiplicar(){
		try{
            var a = parseFloat(document.getElementById('Billete200').value) || 0,
               b = parseFloat(document.getElementById('Billete100').value) || 0,
               c = parseFloat(document.getElementById('Billete50').value) || 0,
               d = parseFloat(document.getElementById('Billete20').value) || 0,
               e = parseFloat(document.getElementById('Billete10').value) || 0,
               f = parseFloat(document.getElementById('Billete5').value) || 0,
               g = parseFloat(document.getElementById('Billete1').value) || 0,
               h = parseFloat(document.getElementById('Moneda1').value) || 0,
               i = parseFloat(document.getElementById('Moneda50').value) || 0,
               j = parseFloat(document.getElementById('Moneda25').value) || 0;

               if (a != '' || a == 0) {
               	  document.getElementById('Billete201').value = (a * 200);
               }
               if (b != '' || b == 0) {
               	  document.getElementById('Billete101').value = (b * 100);
               }
               if (c != '' || c == 0) {
               	  document.getElementById('Billete51').value = (c * 50);
               }
               if (d != '' || d == 0) {
               	  document.getElementById('Billete21').value = (d * 20);
               }
               if (e != '' || e == 0) {
               	  document.getElementById('Billete11').value = (e * 10);
               }
               if (f != '' || f == 0) {
               	  document.getElementById('Billete52').value = (f * 5);
               }
               if (g != '' || g == 0) {
               	  document.getElementById('Billete12').value = (g * 1);
               }
               if (h != '' || h == 0) {
               	  document.getElementById('Moneda11').value = (h * 1);
               }
               if (i != '' || i == 0) {
               	  document.getElementById('Moneda51').value = (i * 0.50);
               }
               if (j != '' || j == 0) {
               	  document.getElementById('Moneda26').value = (j * 0.25);
               }
		}catch(e){}
	}


   $(function () {
    $BotonCobrar = $('#BotonCobrar');
    $BotonQuitar = $('#BotonQuitar');
    $BotonAbrir = $('#BotonAbrir');
    $BotonSalida = $('#BotonSalida');
    $BotonCerrar = $('#BotonCerrar');
     
    $BotonCerrar.on('click',onClickBotonCerrar);
    $BotonSalida.on('click',onClickBotonSalida);
    $BotonAbrir.on('click',onClickBotonAbrir);
    $BotonQuitar.on('click',onClickBotonQuitar);
    $BotonCobrar.on('click',onClickBotonCobrar);
   });


   function onClickBotonCobrar(){
      var Montor = $('#MontoRecibido').val();
			var CodigoCaja = $('#CodigoCaja').val();
			var CodigoVenta = $('#CodigoVenta').val();
      var TotalPagar = $('#TotalPagar').val();
			if (CodigoCaja == '' || CodigoVenta == '' || TotalPagar == '' || Montor == '')
			{
				if (CodigoCaja == '')
	        	{
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique Codigo Caja</font> ');
	        	}
	        	if (CodigoVenta == '')
	        	{
	        	 	alertify.set('notifier','position','top-right');
	        	 	alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique Codigo Venta</font> ');
	        	}
            if (TotalPagar == '') {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique Total A Cobrar</font> ');
            }
            if (Montor == '') {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique El Monto</font> ');
            }
			}
			else
			{
         $BotonCobrar.prop('disabled', true);
				 $.ajax({
					url: 'index.php?view=SistemaCaja22',
					type: 'post',
					data: {'CodigoVenta':CodigoVenta,'TotalPagar':TotalPagar,'CodigoCaja':CodigoCaja},
					dataType: 'json',
					success: function(data) 
					{
						if(data.success==true)
						{
							alertify.success(data.msj);
							setTimeout(function()
							{
							  	//window.location.href = 'impresion.php?id='+data.idventa;
							  	window.location.reload ('index.php?view=SistemaCajaFSR1');
							}, 1000);
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
		}


  function onClickBotonQuitar(){
      var CodigoVenta1 = $('#CodigoVenta1').val();
      if (CodigoVenta1 == '')
      {
        
            if (CodigoVenta1 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique Codigo Venta</font> ');
            }
      }
      else
      {
         $BotonQuitar.prop('disabled', true);
         $.ajax({
          url: 'index.php?view=SistemaCaja33',
          type: 'post',
          data: {'CodigoVenta1':CodigoVenta1},
          dataType: 'json',
          success: function(data) 
          {
            if(data.success==true)
            {
              alertify.success(data.msj);
              setTimeout(function()
              {
                  //window.location.href = 'impresion.php?id='+data.idventa;
                  window.location.reload ('index.php?view=SistemaCajaFSR1');
              }, 1000);
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
    }


    function onClickBotonAbrir(){
      var usuario = $('#usuario').val();
      var apertura = $('#apertura').val();
      var Turnos = $('#Turnoss').val();
      var EstadoCajaAbrir = $('#EstadoCajaAbrir').val();
      if (EstadoCajaAbrir == '') {
        EstadoCajaAbrir = '0';
      }
      if (usuario == '' || apertura == '' || EstadoCajaAbrir == '' || Turnos == '')
      {
        
            if (usuario == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique Codigo</font> ');
            }
            if (apertura == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique El Monto A Iniciar</font> ');
            }
             if (EstadoCajaAbrir == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique Estado</font> ');
            }
            if (Turnos == '') {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Indique El Turno</font> ');
            }
      }
      else
      {
         $BotonAbrir.prop('disabled', true);
         $.ajax({
          url: 'index.php?view=SistemaCaja4',
          type: 'post',
          data: {'usuario':usuario,'apertura':apertura,'EstadoCajaAbrir':EstadoCajaAbrir,'Turnos':Turnos},
          dataType: 'json',
          success: function(data) 
          {
            if(data.success==true)
            {
              alertify.success(data.msj);
              setTimeout(function()
              {
                  //window.location.href = 'impresion.php?id='+data.idventa;
                  window.location.reload ('index.php?view=SistemaCajaFSR1');
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
            alertify.error('<font color="#fffff"><i class="fa fa-times"></i>El Codigo No es Correcto o La Caja Esta Abierta</font> ');
          }
        });
    
      }   
    }

    function onClickBotonSalida(){
      var CodigoCajaa = $('#CodigoCajaa').val();
      var CodigoEstado = $('#CodigoEstado').val();
      var CantidadSalidaa = $('#CantidadSalidaa').val();
      var Comentarioo = $('#Comentarioo').val();
      if (CodigoCajaa == '' || CodigoEstado == '' || CantidadSalidaa == '' || Comentarioo == '')
      {
        
            if (CodigoCajaa == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>No Tiene Abierta la Caja</font> ');
            }
            if (CodigoEstado == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>No Tiene Abierta la Caja</font> ');
            }
            if (CantidadSalidaa == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Monto</font> ');
            }
            if (Comentarioo == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Comentario</font> ');
            }
      }
      else
      {
         $BotonSalida.prop('disabled', true);
         $.ajax({
          url: 'index.php?view=SistemaCaja5',
          type: 'post',
          data: {'CodigoCajaa':CodigoCajaa,'CodigoEstado':CodigoEstado,'CantidadSalidaa':CantidadSalidaa,'Comentarioo':Comentarioo},
          dataType: 'json',
          success: function(data) 
          {
            if(data.success==true)
            {
              alertify.success(data.msj);
              setTimeout(function()
              {
                  //window.location.href = 'impresion.php?id='+data.idventa;
                  window.location.reload ('index.php?view=SistemaCajaFSR1');
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
            alertify.error('<font color="#fffff"><i class="fa fa-times"></i>La Caja No Esta Activa o El Monto es Mayor</font> ');
          }
        });
    
      }   
    }

     function onClickBotonCerrar(){ 
      var IdEstado = $('#IdEstado').val();
      var IdCaja = $('#IdCaja').val();
      var Billete200 = $('#Billete200').val();
      var Billete100 = $('#Billete100').val();
      var Billete50 = $('#Billete50').val();
      var Billete20 = $('#Billete20').val();
      var Billete10 = $('#Billete10').val();
      var Billete5 = $('#Billete5').val();
      var Billete1 = $('#Billete1').val();
      var Moneda1 = $('#Moneda1').val();
      var Moneda50 = $('#Moneda50').val();
      var Moneda25 = $('#Moneda25').val();
      var TotalSalidas = $('#Salidas1').val();
      var TotalSuma = $('#SumaEfectivo').val();
      if (IdCaja == '' || Billete200 == '' || Billete100== '' || Billete50 == '' || Billete20 == '' || Billete10 == '' || Billete5 == '' || Billete1 == '' || Moneda1 == '' || Moneda50 == '' || Moneda25 == '' ||  TotalSuma == '')
      {
        
            if (IdCaja == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>No Tiene Abierta la Caja</font> ');
            }
            if (Billete200 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete200</font> ');
            }
            if (Billete100 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete100</font> ');
            }
            if (Billete50 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete50</font> ');
            }
            if (Billete20 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete20</font> ');
            }
            if (Billete10 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete10</font> ');
            }
            if (Billete5 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete5</font> ');
            }
            if (Billete1 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En el Billete1</font> ');
            }
            if (Moneda1 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En la Moneda1</font> ');
            }
            if (Moneda50 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En la Moneda50</font> ');
            }
            if (Moneda25 == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Ingrese Valor En la Moneda25</font> ');
            }
            if (TotalSuma == '')
            {
              alertify.set('notifier','position','top-right');
              alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Sume el Efectivo</font> ');
            }
      }
      else
      {
         $BotonCerrar.prop('disabled', true);
         $.ajax({
          url: 'index.php?view=SistemaCaja6',
          type: 'post',
          data: {'IdCaja':IdCaja,'IdEstado':IdEstado,'Billete200':Billete200,'Billete100':Billete100,'Billete50':Billete50,'Billete20':Billete20,'Billete10':Billete10,'Billete5':Billete5,'Billete1':Billete1,'Moneda1':Moneda1,'Moneda50':Moneda50,'Moneda25':Moneda25,'TotalSalidas':TotalSalidas,'TotalSuma':TotalSuma},
          dataType: 'json',
          success: function(data) 
          {
            if(data.success==true)
            {
              alertify.success(data.msj);
              setTimeout(function()
              {
                  //window.location.href = 'impresion.php?id='+data.idventa;
                  window.location.reload ('index.php?view=SistemaCajaFSR1');
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
            alertify.error('<font color="#fffff"><i class="fa fa-times"></i>Error Al Cerrar Caja</font> ');
          }
        });
    
      }   
    }

</script>