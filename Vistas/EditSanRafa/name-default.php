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
                                Modificar datos Farmacia San Rafael
                            </div>
                            <div class="full-width panel-content">
                                
                                <form action="index.php?view=UpdateInvenSanRafa" method="post">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Datos del producto en inventario 
                                        
                                                <input   type="text" id="Exist" name="Exist" readonly value="<?echo $_SESSION['CodigoUs'];?>"></h5>

                                   
                                             <div class="mdl-textfield__expandable-holder">
                                                <input value="<? echo ($_REQUEST['Codigo']); ?>" class="mdl-textfield__input" type="text"  id="Codigo" name="Codigo">
                                                <label class="mdl-textfield__label" for="DNIAdmin">Codigo</label>
                                            </div>


                                            <!-- DIV DEVOLVER DATOS PRODUCTOS -->
                                            
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h6>Producto:</h6>
                                               
                                                <?
                                                //INSTANCIA DE LA CLASE PRODUCTOS
                                                $Ob = new inventario ();
                                                $Ob->setCodigo($_REQUEST['Codigo']);
                                                $Ob->ObtenerDatosParaEditar($_REQUEST['Codigo']);
                                                //CARGAR LOS CAMPOS A LA VARIABLE $r
                                                foreach ($Ob->ObtenerProducto($Ob->getIdProducto()) as $r):
                                                ?>   
                                                <select class="form-control select-box" id="Busqueda" name="Busqueda" >
                                                    <option value="<? echo $r->Codigo;?>">
                                                        <? echo $r->NombreProducto; ?>
                                                    </option>
                                                </select>
                                                <? endforeach?>
                                            </div>


                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <h6>Sucursal:</h6>
                                                <select name="Sucursal" id="Sucursal" class="mdl-textfield__input" required="" >
                                                <?
                                                   //CARGAR LOS CAMPOS A LA VARIABLE $r
                                                    foreach($Ob->ObtenerSucursal($Ob->getIdSucursal()) as $r): 
                                                ?>
                                                    <option value="<?php echo $r->Codigo;?>">
                                                        <?php echo $r->Nombre;?>
                                                    </option>
                                                    <?php endforeach; //FIN PHP PRINCIPAL ?>
                                                </select>
                                            
                                            </div>


                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h6>Existencia:</h6>
                                                <input style="height: 60px;" class="mdl-textfield__input" required="" type="text" pattern="-?[0-9]*(\.A-Za-zÃ¡Ã©Ã­Ã³ÃºÃ?Ã‰Ã?Ã“Ãš+)?" id="SegundoApellido" name="Existencia" value="<?echo $Ob->getExistencia ();?>">
                                            </div>


                    
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h6>Laboratorio:</h6>
                                                <?  
                                                //CARGAR LOS CAMPOS A LA VARIABLE $r
                                                 foreach($Ob-> ObtenerLaboratorio($Ob->getIdLaboratorio()) as $r): 
                                                ?>
                                                <select name="Laboratorio" id="Laboratorio" class="form-control select-box" >
                                                    <option value="<?php echo $r->LabCod;?>">
                                                        <?php echo $r->NomCasa." (".$r->NomMarca.")";?>
                                                    </option>
                                                </select>
                                                 <?php endforeach; //FIN PHP PRINCIPAL ?>
                                            </div>

                                        </div>



                                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Mas Detalles</h5>
                                            <br></br>
                                            <!-- DIV CON LA INFORMACION DE LA UBICACION -->
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <h6>Ubicacion:</h6>
                                                <?
                                                //CARGAR LOS CAMPOS A LA VARIABLE $r
                                                foreach($Ob->ObtenerUbicacion($Ob->getIdUbicacion()) as $r): 
                                                ?>
                                                <select name="Ubicacion" id="Ubicacion" class="form-control select-box">
                                                    <option value="<?php echo $r->Codigo;?>">
                                                        <?php echo $r->Nombre." (".$r->Exacta.")";?>
                                                    </option>
                                                </select>
                                                <?php endforeach; //FIN PHP PRINCIPAL ?>
                                            </div>


                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <h6>Fecha Vencimiento:</h6>
                                                <input type="date" class="mdl-textfield__input" name="FechaVencimiento" value="<?echo $Ob->getFechaVencimiento ();?>">
                                            </div>

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input style="height: 60px;" class="mdl-textfield__input" required="" type="text" id="Politica" name="Politica" value="<?echo $Ob->getPolitica ();?>">
                                                <label class="mdl-textfield__label">Politica:</label>
                                            </div>


                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-center">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </button>
                                        <div class="mdl-tooltip" for="btn-addAdmin">Modificar</div>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>

    <script>
        $('#Busqueda').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Busqueda', 'index.php?view=Autocomplete&keyword=');

        $('#Laboratorio').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Laboratorio', 'index.php?view=AutocompleteLaboratories&keyword=');

        $('#PoliticaB').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('PoliticaB', 'index.php?view=AutocompletePolitic&keyword=');

        $('#Ubicacion').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Ubicacion', 'index.php?view=AutocompleteLocations&keyword=');

        $('#Sucursal').chosen({allow_single_deselect:true, search_contains: true});
        chosen_ajaxify('Sucursal', 'index.php?view=AutocompleteSucursal&keyword=');
    </script>
</body>
</html>