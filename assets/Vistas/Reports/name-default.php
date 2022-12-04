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

 <!-- pageContent -->
	<section class="full-width pageContent">
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				
			</div>
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Reportes Farmacia San Rafael
							</div>

							<div class="full-width panel-content">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Reportes en PDF</h5>
										
											

											<h4>Empleados</h4>
							
											<div class="col-5">
												<a href="index.php?view=Option&Codigo=1"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Empleados Lite</a>
											</div>

											<h4>Empleados en Exel</h4>
											<div class="col-5">
												<a href="index.php?view=Option&Codigo=19"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Empleados Lite</a>
											</div>		

											<h4>Salidas a Sucursales</h4>
											<div class="col-5">
												<a href="index.php?view=Option&Codigo=31"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Salida Por Sucursal</a>
												<a href="index.php?view=Option&Codigo=2" class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Salida Por Mes</a>
											</div>	


											<div class="col-5">
											<h4>Reporte Inventario</h4>
												<a href="index.php?view=Option&Codigo=21"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Reporte General</a>
											</div>	

											<div class="col-5">
											<h4>Reportes Ventas y Cuadre Caja</h4>
												<a href="index.php?view=Option&Codigo=900"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Cuadre de Caja</a>
												<a href="index.php?view=Option&Codigo=901"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Reporte Ventas</a>
											</div>	

											<div class="col-5">
											<h4>Reportes Ventas y Cuadre Caja Actualizado</h4>
												<a href="#" data-toggle="modal" data-target="#modalContactForm4211" class="btn btn-primary" ><i class="fa fa-folder-open">Cuadre de Caja</i></a>
												<a href="#" data-toggle="modal" data-target="#modalContactForm421" class="btn btn-primary" ><i class="fa fa-folder-open">Reporte Ventas</i></a> 
											</div>			

										</div>


										<!-- AQUI INICIAN LOS REPORTES EN EXCEL -->


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Reportes Excel</h5>

											<h4>Inventario Sucursales</h4>
											<div class="col-10">
												<a href="index.php?view=Option&Codigo=23" class="btn btn-default" style="width: 150px; background-color: #E6E6E6;"> Bodega</a>
												<a href="index.php?view=Option&Codigo=24" class="btn btn-default" style="width: 150px; background-color: #E6E6E6;"> Bodeguita</a>
												<a href="index.php?view=Option&Codigo=25"  class="btn btn-default" style="width: 150px; background-color: #E6E6E6;">San Rafael</a>
												<br></br>
												<a href="index.php?view=Option&Codigo=26"  class="btn btn-default" style="width: 150px; background-color: #E6E6E6;">San Rafael #1 </a>
												<a href="index.php?view=Option&Codigo=27"  class="btn btn-default" style="width: 150px; background-color: #E6E6E6;">San Juan</a>
											</div>


											<h4>Ventas</h4>

											<div class="col-5">
												<a href="index.php?view=Option&Codigo=32"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Horario Venta</a>
												
											</div>

											<h4>Ventas Por Fecha</h4>

											<div class="col-5">
												<a href="index.php?view=Option&Codigo=58"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Reporte de ventas</a>
												<a href="index.php?view=Option&Codigo=59"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Ventas General</a>
												<a href="index.php?view=Option&Codigo=60"  class="btn btn-default" style="background-color: #E6E6E6; width: 150px;">Ventas Dependiente</a></div>

											<h4>Estadisticas de Ventas Por Dependientes</h4>
											<div class="col-5">
												<a href="index.php?view=Option&Codigo=91" class="btn btn-default" style="background-color: #E6E6E6; width: 160px;">Reporte Actualizado</a>
												<a href="index.php?view=Option&Codigo=92" class="btn btn-default" style="background-color: #E6E6E6; width: 160px;">Reporte Graficas Mes</a>
											</div>

											<h4>Nuevo Reporte Busqueda</h4>
											<div class="col-5">
												<button id="send" class="btn btn-info">
            	                                <a href="#" data-toggle="modal" data-target="#modalContactForm4" class="btn btn-primary" ><i class="fa fa-folder-open">Rastrear Ventas</i></a> 
            	                                </button>

            	                                <button id="send" class="btn btn-info">
            	                                <a href="#" data-toggle="modal" data-target="#modalContactForm5" class="btn btn-primary" ><i class="fa fa-folder-open">Rastrear Salidas</i></a> 
            	                                </button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>

	 <div class="modal fade" id="modalContactForm4211" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>Reporte Actualizado Cuadre Caja</h4>
            </div>

            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    	<div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="SucursalBs" id="SucursalBs" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

						<div class="col-md-4">
							    <div>
								Fecha de Reporte:
								<input type="date" name="FechaInicios" id="FechaInicios" class="form-control">
							    </div>
						</div>  

					    <div class="col-md-4">
                                 <div>
								  Sucursal:
                                 <select name="Turnoss" id="Turnoss" class="mdl-textfield__input" required="">
                                 <option>Turno Mañana</option>
                                 <option>Turno Tarde</option>      
                                 </select>
                                </div>
						</div>

			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="button" class="btn btn-sm btn-primary Repor122">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>
    

    <div class="modal fade" id="modalContactForm421" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-eye"></i>Reporte Actualizado Ventas</h4>
            </div>

            <div class="modal-body" style="max-height:450px; overflow:auto;" id="bodyDetalle">
                <div class="div-result">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="photo">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    	<div class="col-md-4">
                              <div>
							   Sucursal:
                               <select name="SucursalB" id="SucursalB" class="mdl-textfield__input" required="">
                               	<? $model = new Sucursales();
                               	foreach($model->Listar() as $r): 
                                ?>
                                 <option value="<?php echo $r->Codigo;?>">
                                 <?php echo $r->Nombre;?>
                                 </option>
                               <?php endforeach; //FIN PHP PRINCIPAL ?>
                               </select>
                               </div>
						</div>

						<div class="col-md-4">
							    <div>
								Fecha de Reporte:
								<input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
							    </div>
						</div>  

					    <div class="col-md-4">
                                 <div>
								  Sucursal:
                                 <select name="Turnos" id="Turnos" class="mdl-textfield__input" required="">
                                 <option>Turno Mañana</option>
                                 <option>Turno Tarde</option>      
                                 </select>
                                </div>
						</div>

			      </div>
               
                          <div class="modal-footer d-flex justify-content-center">
                          	    <button type="button" class="btn btn-sm btn-primary Repor12">Crear Reporte</button>
                          	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         </div>  <!-- /modal-footer -->

                        </div> <!-- product image -->
                    </div><!--End tab panels-->
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>

	
	<div class="modal fade" id="modalContactForm4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Control Restringido Sleiter Ventas</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <i class="fa fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="fname">Tranquilo Sleiter Tiene la Clave</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <div class="col-md-4">
              <label >Ingrese su Codigo</label>
                        <input type="password" class="form-control" id="CodigoVenta1"  name=" CodigoVenta1" autocomplete="off" >
                        </div>
          </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button id="BotonQuitar" class="BotonQuitar" class="btn btn-info guardar-carritoss">
              <a href="#" data-toggle="modal" class="btn btn-sm btn-primary Repor" ><i>Verificar</i></a> </button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade" id="modalContactForm5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title font-weight-bold">Control Restringido Sleiter Salidas</h3>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <i class="fa fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="fname">Tranquilo Sleiter Tiene la Clave</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <div class="col-md-4">
              <label >Ingrese su Codigo</label>
                        <input type="password" class="form-control" id="CodigoVenta2"  name=" CodigoVenta1" autocomplete="off" >
                        </div>
          </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button id="BotonQuitar" class="BotonQuitar" class="btn btn-info guardar-carritoss">
              <a href="#" data-toggle="modal" class="btn btn-sm btn-primary Repor1" ><i>Verificar</i></a> </button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	 
        $(".Repor").off("click");
  $(".Repor").on("click", function(e) 
  {
    var CodigoVenta1 = $('#CodigoVenta1').val();
    if (CodigoVenta1 == '') {
    	alert('Campo Vacio Ingrese su Codigo..');
    }else if (CodigoVenta1 == '1sleiter2')
    { 
    	window.location = "index.php?view=Option&Codigo=94";
    }
    else 
    {
      alert('Codigo Incorrecto..');
      
    }   
  });

   $(".Repor1").off("click");
  $(".Repor1").on("click", function(e) 
  {
    var CodigoVenta1 = $('#CodigoVenta2').val();
    if (CodigoVenta1 == '') {
    	alert('Campo Vacio Ingrese su Codigo..');
    }else if (CodigoVenta1 == '1sleiter2')
    { 
    	window.location = "index.php?view=Option&Codigo=95";
    }
    else 
    {
      alert('Codigo Incorrecto..');
      
    }   
  });


  $(".Repor12").off("click");
	$(".Repor12").on("click", function(e) 
	{
		var Inicio = $('#FechaInicio').val();
		var Sucursal = $('#SucursalB').val();
		var Turnos = $('#Turnos').val();

		if (Inicio == '' || Sucursal == '' || Turnos == '' )
		{
			if (Inicio == '')
			{
				alert('POR FAVOR INDIQUE LA FECHA INICIAL');
			}
			if (Sucursal == '') {
				alert("POR FAVOR INDIQUE LA SUCURSAL");
			}
			if(Turnos == ''){
				alert("POR FAVOR INDIQUE LA HORA DE SALIDA DE TURNO");
			}
		}
		else if(Sucursal == '4')
		{
			window.location = "index.php?view=SistemaCajaReporte3&Inicio="+Inicio+"&Sucursal="+Sucursal+"&Turnos="+Turnos;
		}else if(Sucursal == '1')
		{
			window.location = "index.php?view=SistemaCajaReporte33&Inicio="+Inicio+"&Sucursal="+Sucursal+"&Turnos="+Turnos;
		}else if(Sucursal == '5')
		{
			window.location = "index.php?view=SistemaCajaReporte333&Inicio="+Inicio+"&Sucursal="+Sucursal+"&Turnos="+Turnos;
		}	
	});


	$(".Repor122").off("click");
	$(".Repor122").on("click", function(e) 
	{
		var Inicio = $('#FechaInicios').val();
		var Sucursal = $('#SucursalBs').val();
		var Turnos = $('#Turnoss').val();

		if (Inicio == '' || Sucursal == '' || Turnos == '' )
		{
			if (Inicio == '')
			{
				alert('POR FAVOR INDIQUE LA FECHA INICIAL');
			}
			if (Sucursal == '') {
				alert("POR FAVOR INDIQUE LA SUCURSAL");
			}
			if(Turnos == ''){
				alert("POR FAVOR INDIQUE LA HORA DE SALIDA DE TURNO");
			}
		}
		else 
		{
			window.location = "index.php?view=SistemaCajaReporte11&Inicio="+Inicio+"&Sucursal="+Sucursal+"&Turnos="+Turnos;
		}	
	});

</script>