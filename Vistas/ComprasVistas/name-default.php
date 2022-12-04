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
                    <p class="text-condensedLight" style="color: #0A1443">
                         <B>Rastrear Facturas Productos entre otros</B> 
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
                                   <div class="full-width panel-tittle text-center tittles" style="background-color: #06D6CD">
                                        Salidas
                                   </div>

                                   <div class="full-width panel-content">
                                        <div class="row col-lg-16">
                                             
                                             <div class="col-lg-4">
                                                  <div>ELEGIR MODO DE BUSQUEDA:
                                                       <br></br>
                                                       <select class="form-control" id="Origen" name="Origen">
                                                            <option value="NUMFACTURA">NUMERO FACTURA</option>
                                                            <option value="FECHAREG">FECHA REGISTRO</option>
                                                            <option value="PRODUCT1">PRODUCTO</option>
                                                       </select>
                                                  </div>
                                             </div>

                                             <div class="col-lg-4">
                                              <div>Numero Factura, Nombre Producto.
                                                <br></br>
                                              <select class="form-control select-box" id="cbo_producto" name="cbo_producto">
                                                  <option >
                                                     
                                                  </option>
                                              </select>  
                                               </div>
                                           </div>

                                           <div class="col-lg-4">
                                              <div>Fecha:
                                                 <br></br>
                                                  <input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
                                              </div>
                                          </div><p></p><br></br><br></br>
                              </div>



                                        <div class="full-width divider-menu-h"></div>
                                        <div class="row table-responsive">
                                             <table class="table table-bordered table-hover" class="table table-striped">
                                                  <thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
                                                       <tr style="background-color: #06D6CD;">
                                                            <th>
                                                                 <center>
                                                                      Rastrear
                                                                 </center>
                                                            </th>
                                                            
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td cent> 
                                                              <div class="text-center">
                                                               <button type="button" class="btn btn-sm btn-primary Repor"style="background-color: #06D6CD">Rastrear</button>
                                                              </div>                              </td>
                                                 
                                                       </tr>
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



        
        $(".Repor").off("click");
  $(".Repor").on("click", function(e) 
  {
    var Origen = $('#Origen').val();
    var Producto = $('#cbo_producto').val();
    var Fecha = $('#FechaInicio').val();

    if (Origen == '')
    {
      if (Origen == '')
      {
        alert('INDIQUE LA SUCURSAL');
      }
    }
    else 
    { if (Origen == 'NUMFACTURA') {
      window.location = "index.php?view=MostrarCompras&Origen="+Origen+"&Producto="+Producto;
      }else if (Origen == 'FECHAREG') {
        window.location = "index.php?view=MostrarCompras1&Origen="+Origen+"&Fecha="+Fecha;
      }else if (Origen == 'PRODUCT1') {
        window.location = "index.php?view=MostrarCompras2&Origen="+Origen+"&Producto="+Producto;
      }
      
    }   
  });
       


        //METOTO PARA VERIFICAR QUE NO SE MUEVAN PRODUCTOS A LA MISMA SUCURSAL

        function VerificaSucursal ()
        {
          var Origen = $('#Origen').val();
          var Destino = $('#Destino').val();
         
               if(Origen != '' )
               {
                    if (Origen == 'NUMFACTURA')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteCompra1&keyword=');
                    }
                    if(Origen == 'PRODUCT1')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteBodega&keyword=');
                    }
               }
        }

        //AL SELECCIONAR UNA SUCURSAL VERIFICAR SI ES VALIDA

        $('select[name=Origen]').change(function()
        {
          var IdProd = $('#Origen').val();
          VerificaSucursal();
        });
       

     </script>
</body>
</html>