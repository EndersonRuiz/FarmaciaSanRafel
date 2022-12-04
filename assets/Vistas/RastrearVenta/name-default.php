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
                         <B>Rastrear productos Vendidos</B> 
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
                                   <div class="full-width panel-tittle text-center tittles" style="background-color: #138609">
                                        Salidas
                                   </div>

                                   <div class="full-width panel-content">
                                        <div class="row col-lg-16">
                                             
                                             <div class="col-lg-4">
                                                  <div>Origen:
                                                       <br></br>
                                                       <select class="form-control" id="Origen" name="Origen">
                                                            <option>
                                   
                                                            </option>
                                                       </select>
                                                  </div>
                                             </div>

                                             <div class="col-lg-4">
                                              <div>Nombre del Producto:
                                                <br></br>
                                              <select class="form-control select-box" id="cbo_producto" name="cbo_producto">
                                                  <option >
                                                     
                                                  </option>
                                              </select>  
                                               </div>
                                           </div>

                                           <div class="col-lg-2">
                                              <div>Fecha Inicio Reporte:
                                                 <br></br>
                                                  <input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
                                              </div>
                                          </div>

                                          <div class="col-lg-2">
                                              <div>Fecha Fin Reporte:
                                                 <br></br>
                                                  <input type="date" name="FechaInicio1" id="FechaInicio1" class="form-control">
                                              </div>
                                          </div><p></p><br></br><br></br>
                              </div>



                                        <div class="full-width divider-menu-h"></div>
                                        <div class="row table-responsive">
                                             <table class="table table-bordered table-hover" class="table table-striped">
                                                  <thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
                                                       <tr style="background-color: #138609;">
                                                            <th>
                                                                 <center>
                                                                      Rastrear
                                                                 </center>
                                                            </th>
                                                            <th width="50px;">
                                                                 <center>
                                                                      Id
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
                                                            <div class="col-md-2">
                                        <div class="text-center">
                    <button type="button" class="btn btn-sm btn-primary Repor"style="background-color: #138609">Rastrear</button>
                      </div>
                  </div>
                                                  </td>
                                                  <td>
                                                                 <input type="text" id="Id" name="Id" class="form-control" disabled="true">
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

        $('#Origen').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Origen', 'index.php?view=AutocompleteSucursal&keyword=');



        
        $(".Repor").off("click");
  $(".Repor").on("click", function(e) 
  {
    var Origen = $('#Origen').val();
    var Producto = $('#cbo_producto').val();
    var Fecha = $('#FechaInicio').val();
    var Fecha1 = $('#FechaInicio1').val();

    if (Origen == '' || Producto == '' || Fecha == '' )
    {
      if (Origen == '')
      {
        alert('INDIQUE LA SUCURSAL');
      }
      if (Producto == '') {
        alert("INDIQUE EL PRODUCTO");
      }
      if(Fecha == ''){
        alert("INDIQUE LA FECHA");
      }
      if(Fecha1 == ''){
        alert("INDIQUE LA FECHA");
      }
    }
    else 
    {
      if(Origen == '4'){
         window.location = "index.php?view=RastrearVenta1&Origen="+Origen+"&Producto="+Producto+"&Fecha="+Fecha+"&Fecha1="+Fecha1;
      }else if (Origen == '1') {
        window.location = "index.php?view=RastrearVenta1ss&Origen="+Origen+"&Producto="+Producto+"&Fecha="+Fecha+"&Fecha1="+Fecha1;
      }else if (Origen == '5') {
        window.location = "index.php?view=RastrearVenta1s&Origen="+Origen+"&Producto="+Producto+"&Fecha="+Fecha+"&Fecha1="+Fecha1;
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
                    if (Origen == '1')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteSanJuan&keyword=');
                    }
                    if(Origen == '2')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteBodeguita&keyword=');
                    }
                    if(Origen == '3')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteBodega&keyword=');
                    }
                    if(Origen == '4')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoComplete1&keyword=');
                    }
                    if(Origen == '5')
                    {
                         $('#cbo_producto').chosen({allow_single_deselect:true, search_contains: true});
                         chosen_ajaxify('cbo_producto', 'index.php?view=AutoCompleteSanRafael1&keyword=');
                    }
               }
        }

        //AL SELECCIONAR UNA SUCURSAL VERIFICAR SI ES VALIDA

        $('select[name=Origen]').change(function()
        {
          var IdProd = $('#Origen').val();
          VerificaSucursal();
        });

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

         //AL SELECCIONAR UN PRODUCTO DEVOLVER LA INFORMACION

        $('select[name=cbo_producto]').change(function()
        {
          var IdProd = $('#cbo_producto').val();
          DataProduct_2(IdProd);
        });

       

     </script>
</body>
</html>