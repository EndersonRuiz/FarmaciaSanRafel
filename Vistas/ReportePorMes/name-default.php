<?
     session_start();
     if($_SESSION["NombreUsuario"] == ''){
     	print "<script>
     	windows.location='index.php?view=loguin';
     	</script>";
     }else{
     	require_once 'models/Header.php';
     }
?>

<body>
	<section class="full-width pageContent">
          <section class="full-width header-well">
               <div class="full-width header-well-icon">
                   <i class="zmdi zmdi-shopping-cart"></i> 
               </div>
               <div class="full-width header-well-text">
                    <p class="text-condensedLight" style="color: #66CC00">
                         <B>Seleccione el Rango de Fechas Para hacer su Reporte de Salida de [Productos]</B> 
                    </p>
               </div>
          </section>

          <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
               <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
                    <div class="mdl-grid">
                         <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                              <div class="full-width panel mdl-shadow--2dp">
                                   <div class="full-width panel-tittle bg-primary text-center tittles" style="color: #FFFFFF;">
                                        <b>Reporte por Fechas</b>
                                   </div>
                                   <div class="full-width panel-content">
                                        <div class="row"><p></p>

                                             <div class="col-lg-3">
                                                  Sucursal Que Envia
                                                  <select class="mdl-textfield__input" required="" id="SucursalA" name="SucursalA">
                                                       <?
                                                       //Instancia de la clase de empleados
                                                       $model = new Sucursales();
                                                       foreach ($model->listar() as $r):
                                                       ?>
                                                       <option value="<?php echo $r->Codigo; ?>">
                                                            <?php echo $r->Nombre; ?>
                                                       </option>
                                                       <?php endforeach; ?>
                                                  </select>
                                             </div><p></p>

                                             <div class="col-lg-3">
                                                  Sucursal Que Recibe
                                                  <select class="mdl-textfield__input" required="" id="SucursalB" name="SucursalB">
                                                       <?
                                                       $model = new Sucursales();
                                                       foreach ($model->listar() as $r):
                                                       ?>
                                                       <option value="<?php echo $r->Codigo; ?>">
                                                            <?php echo $r->Nombre; ?>
                                                       </option>
                                                       <?php endforeach ?>
                                                  </select>
                                             </div><p></p>

                                             <div class="col-lg-3">
                                                  Fecha Inicial
                                                  <input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
                                             </div><p></p>

                                             <div class="col-lg-3">
                                                  Fecha Final
                                                  <input type="date" name="FechaFin" id="FechaFin" class="form-control">
                                             </div><p></p>
                                        </div><p></p><p></p><p></p><p></p>
                                        <div class="row">
                                             
                                             <div class="col-lg-2">
                                                  Reporte:
                                                  <button type="button" class="btn btn-sm btn-primary repor">Crear Reporte</button>
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

<script type="text/javascript">
     
     $(".repor").off("click");
     $(".repor").on("click", function(e){
          var Sucursal1 = $('#SucursalA').val();
          var Sucursal2 = $('#SucursalB').val();
          var Fecha1 = $('#FechaInicio').val();
          var Fecha2 = $('#FechaFin').val();

          if(Sucursal1 == '' || Sucursal2 == '' || Fecha1 == '' || Fecha2 == '' ){
               if(Sucursal1 == ''){
                   alert('Favor Indicar sucursal de Salida');
               }
               if(Sucursal2 == ''){
                    alert('Favor Indicar Sucursal de Destino');
               }
               if(Fecha1 == ''){
                    alert('Favor Indicar Fecha de Inicio');
               }
               if(Fecha2 == ''){
                    alert('Favor Indicar Fecha Final');
               }
          }else{
               window.location = "index.php?view=Excel2&Sucursal1="+Sucursal1+"&Sucursal2="+Sucursal2+"&Fecha1="+Fecha1+"&Fecha2="+Fecha2;
          }
     });

</script>