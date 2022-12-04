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
                    <a href="#tabListAdmin" class="mdl-tabs__tab is-active">Ver Registros</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="tabListAdmin">
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
                    "last":         "Última",
                    "next":         "Siguiente",
                    "previous":     "Anterior"
                },
                "aria": {
                    "sortAscending":    "Ordenación ascendente",
                    "sortDescending":   "Ordenación descendente"
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
                {"data": 6} 
            ],
        });
        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
</script>


</body>
</html>