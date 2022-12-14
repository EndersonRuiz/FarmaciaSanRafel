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
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                    <a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nuevo Registro</a>
                    <a href="#tabListAdmin" class="mdl-tabs__tab">Ver Registros</a>
            </div>

            <!--apartado donde se Registra -->

            <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Nuevo Registro
                            </div>
                            <div class="full-width panel-content">
                                <form action="index.php?view=Bodega2" method="POST" autocomplete="off">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Datos</h5>


                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h5>Producto:</h5>
                                               
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
                                            

                                                <!-- BOTON PARA AGREGAR UN NUEVO PRODUCTO -->

                                                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#AddProduct" id="addProductModalBtn"><i class="glyphicon glyphicon-plus-sign">NUEVO</i></a>
                                            </div>
                                                
				                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				                                
                                            <h5>Laboratorio:</h5>
                                                <?

                                                    //INSTANCIA DE LA CLASE EMPLEADOS

                                                    $model = new Laboratorios();

                                                    //CARGAR LOS CAMPOS A LA VARIABLE $r

                                                    foreach($model->Listar_3() as $r): 
                                                ?>
                                                <select name="Laboratorio" id="Laboratorio" class="form-control select-box">
                                                    <option value="<?php echo $r->LabCod;?>">
                                                        <?php echo $r->NomCasa." (".$r->NomMarca.")";?>
                                                    </option>
                                                </select>
                                                <?php endforeach; //FIN PHP PRINCIPAL ?>
			                                </div>


                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h5>Ubicacion:</h5>
                                                    <?

                                                    //INSTANCIA DE LA CLASE EMPLEADOS

                                                    $model = new Ubicaciones();

                                                    //CARGAR LOS CAMPOS A LA VARIABLE $r

                                                    foreach($model->Listar_2() as $r): 
                                                    ?>
                                                    <select name="Ubicacion" id="Ubicacion" class="form-control select-box">
                                                        <option value="<?php echo $r->Codigo;?>">
                                                            <?php echo $r->Nombre." (".$r->Estante.")";?>
                                                        </option>
                                                    </select>
                                                    <?php endforeach; //FIN PHP PRINCIPAL ?>
                                                    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addLocation" onclick="" id="addLocations"><i class="glyphicon glyphicon-plus-sign">NUEVA</i></a>
                                                </div>


                                    

                        

                                            </div>
                                            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                                <h5 class="text-condensedLight">Mas Detalles</h5>
                                                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h5>Fecha Vencimiento:</h5>
                                                <input type="date" required="" name="FechaVencimiento" class="mdl-textfield__input">
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input style="height: 60px;" class="mdl-textfield__input" required="" type="text" id="SegundoApellido" name="Politica">
                                                        <label class="mdl-textfield__label">Politica:</label>
                                            </div>
                                                
                                            </div>
                                    </div>

                                    <p class="text-center">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
                                                <i class="zmdi zmdi-plus"></i>
                                        </button>
                                        <div class="mdl-tooltip" for="btn-addAdmin">Guardar</div>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mdl-tabs__panel" id="tabListAdmin">
                <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                            <div class="full-width panel mdl-shadow--2dp">
                                <div class="full-width panel-tittle bg-success text-center tittles">
                                        Listado de los Laboratorios
                                </div>
                                <div class="full-width panel-content">

                                 </div>

								    <div class="full-width divider-menu-h"></div>
								        <div class="row table-responsive">
								           <table class="table table-bordered table-hover display" class="table table-striped" id="miTabla_1">
                                                <thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>CodigoBarra</th>
                                                        <th>Nombre Medicamento</th>
                                                        <th>Existencia</th>
                                                        <th>PrecioVenta</th>
                                                        <th>Categoria</th>
                                                        <th>Sucursal</th>
                                                        <th>Info</th>
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
            </div>
	</section>



    <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
 

	<script>
        $('#Busqueda').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Busqueda', 'index.php?view=Autocomplete&keyword=');

        $('#Laboratorio').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Laboratorio', 'index.php?view=AutocompleteLaboratories&keyword=');

        $('#Ubicacion').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Ubicacion', 'index.php?view=AutocompleteLocations&keyword=');

        $('#SucursalB').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('SucursalB', 'index.php?view=AutocompleteSucursal&keyword=');

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
                    "last":         "??ltima",
                    "next":         "Siguiente",
                    "previous":     "Anterior"
                },
                "aria": {
                    "sortAscending":    "Ordenaci??n ascendente",
                    "sortDescending":   "Ordenaci??n descendente"
                }
            },
            "lengthMenu":               [[5,10,20,25,50,100], [5,10,20,25,50,100]],
            "iDisplayLength":           10,
            "bServerSide":              true,
            "sAjaxSource":              "index.php?view=FetchInventory",
            "columns" : [
                {"data": 0},
                {"data": 1},
                {"data": 2},
                {"data": 3}, 
                {"data": 4},
                {"data": 5},
                {"data": 6},
                {"data": 7} 
            ],
        });
        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
</script>



 <div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
           
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Registro Ubicaciones</h4>
                </div>
                
                <div class="modal-body">
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="fname">Nombre/Estante etc:</label>
                        <input type="text" id="Estante" class="form-control validate" required="" placeholder="Estante #1">
                    </div>
                    <br></br>
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="fname">Seccion/Gabeta/Exacta etc:</label>
                        <input type="text" id="Gabeta" class="form-control validate" required="" placeholder="Gabeta A-1">
                    </div>

                </div>
                
                <div class="modal-footer d-flex justify-content-center">
                    <button id="send" class="btn btn-info"> Registrar <i class="fa fa-paper-plane-o ml-1"></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


     <script>
       $('#addLocation').on('click', '.btn-info', function (e){
            var FechaP = $('#Estante').val();
            var FechaV = $('#Gabeta').val();

            $.post('index.php?view=AddLocationModal',
            {
                Fp:FechaP, Fv:FechaV
            },function (response,status)
            {
                alert ('Registro exitoso');
            });
            $('#addLocation').modal('hide');
        });
    </script>



 <div class="modal fade" id="AddSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
           
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Registro Sucursales</h4>
                </div>
                
                <div class="modal-body">
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="fname">Nombre de la bodega o sucursal:</label>
                        <input type="text" id="sucur" class="form-control validate" required="" placeholder="San Rafael 1">
                    </div>
                </div>
                
                <div class="modal-footer d-flex justify-content-center">
                    <button id="send" class="btn btn-info"> Registrar <i class="fa fa-paper-plane-o ml-1"></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('#AddSucursal').on('click', '.btn-info', function (e){
            var FechaP = $('#sucur').val();

            $.post('index.php?view=AddSucursal',
            {
                Fp:FechaP
            },function (response,status)
            {
                alert ('Registro exitoso');
            });
            $('#AddSucursal').modal('hide');
        });
    </script>

    <!-- Modal PARA CONFIRMAR LA ELIMINACION DEL REGISTRO -->

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </div>
                
                <div class="modal-body">
                    ??Desea eliminar este registro?
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT PARA ACTIVAR EL MODAL AL MOMENTO DE PRECIONAR EL BOTON CONFIRMAR ELIMINACION -->

    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>   

    <!-- SCRIPT ENCARGADO DE IR A LA URL MEDIANTE AJAX  -->
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function(){
                var parent = $(this).parent().attr('Codigo');
                var service = $(this).parent().attr('data');
                var dataString = 'Codigo='+service;
                
                $.ajax({
                    type: "POST",
                    url: "index.php?view=DeleteInventory",
                    data: dataString,
                    success: function() {           
                        location.reload();
                    }
                });
            });                 
        });    
    </script>

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
                            <a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab" >Informaci??n del producto</a>
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

                        <!-- Informaci??n Producto -->
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

                                <br></br>

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

</body>
</html>