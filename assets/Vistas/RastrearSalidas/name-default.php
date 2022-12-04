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
                    <p class="text-condensedLight" style="color: #CB0813">
                         <B>Rastrear productos Salidas</B> 
                    </p>
               </div>
          </section>

          <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
               <!--clase donde se Registra al Usuario-->
               <div class="mdl-tabs__tab-bar">
                    <a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Rastrear</a>
               </div>

               <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
                    <div class="mdl-grid">
                         <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                              <div class="full-width panel mdl-shadow--2dp">
                                   <div class="full-width panel-tittle text-center tittles" style="background-color: #050505">
                                       Rastrear Salidas
                                   </div>

                                   <div class="full-width panel-content">
                                        <div class="row col-lg-16">

                                             <div class="col-lg-4">
                                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h5>Nombre del Producto:</h5>
                                               
                                                <?
                                                        //INSTANCIA DE LA CLASE EMPLEADOS

                                                $model = new Productos();

                                                //CARGAR LOS CAMPOS A LA VARIABLE $r

                                                foreach($model->ListarMax() as $r): 
                                                ?>
                                              
                                               <select class="form-control select-box" id="Busqueda" name="Busqueda">
                                                    <option value="<? echo $r->Codigo?>">
                                                        <? echo $r->NombreProducto; ?>
                                                    </option>
                                               </select>
                                                <?php endforeach; //FIN PHP PRINCIPAL ?>
                                            </div></div>

                                            <div class="col-lg-4">
                                              <div>Fecha Inicio Reporte:
                                                 <br></br>
                                                  <input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
                                              </div>
                                          </div>
                                             

                                           <div class="col-lg-4">
                                              <div>Fecha Inicio Reporte:
                                                 <br></br>
                                                  <input type="date" name="FechaFin" id="FechaFin" class="form-control">
                                              </div>
                                          </div><p></p><br></br><br></br>
                              </div>



                                        <div class="full-width divider-menu-h"></div>
                                        <div class="row table-responsive">
                                             <table class="table table-bordered table-hover" class="table table-striped">
                                                  <thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
                                                       <tr style="background-color: #050505;">
                                                            <th>
                                                                 <center>
                                                                      Rastrear
                                                                 </center>
                                                            </th>
                                                           
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td> 
                                                              <div class="text-center">
                                                               <button type="button" class="btn btn-sm btn-primary Repor" style="background-color: #050505">Rastrear Salidas</button>
                                                            </div>
                                                           </td>
                                                  </tbody>
                                             </table>
                                        </div> 


                                   </div>
                              </div>
                         </div>
                    </div>
                  
               </div>
                           
     </section>

     
                    </div><!--End tab panels-->
                </div><!--DIV RESULT-->
            </div><!--Modal Body-->
        </div> <!--Modal Conten-->
        </div> <!-- Modal Dialog-->
    </div>

     <script type="text/javascript">
          //AUTOCOMPLETADOR O BUSCADOR AL SELECT
          $('#Busqueda').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Busqueda', 'index.php?view=Autocomplete&keyword=');



        
        $(".Repor").off("click");
  $(".Repor").on("click", function(e) 
  {
    var Origen = $('#Busqueda').val();
    var FechaInicio = $('#FechaInicio').val();
    var FechaFin = $('#FechaFin').val();

    if (Origen == '' || FechaInicio == '' || FechaFin == '' )
    {
      if (Origen == '')
      {
        alert('INDIQUE Nombre Producto');
      }
      if (FechaInicio == '') {
        alert("INDIQUE Fecha Inicio");
      }
      if(FechaFin == ''){
        alert("INDIQUE Fecha Fin");
      }
    }
    else 
    {
      window.location = "index.php?view=RastrearSalidas1&Origen="+Origen+"&FechaInicio="+FechaInicio+"&FechaFin="+FechaFin;
    }   
  });
      
       

     </script>
</body>
</html>