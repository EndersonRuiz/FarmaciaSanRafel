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
                         <B>Grafica de Ventas de Farmacias Sanrafael, San Juan y San Rafael1 </B> 
                    </p>
               </div>
          </section>

          <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
               <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
                    <div class="mdl-grid">
                         <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                              <div class="full-width panel mdl-shadow--2dp">
                                   <div class="full-width panel-tittle bg-primary text-center tittles" style="color: #FFFFFF;">
                                        <b>Reporte</b>
                                   </div>
                                   <div class="full-width panel-content">

                                       <figure class="highcharts-figure">
                                        <div id="container"></div>
                                        <p class="highcharts-description">
                                        Este es un grafico circular 3D con un radio interno agregado.
                                         Estos graficos a menudo se denominan graficos de anillos.
                                         </p>
                                       </figure>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
        
    </section>

    <script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Estadistica de Ventas que realizan los Dependientes'
    },
    subtitle: {
        text: 'Grafica en 3D'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Cantidad Vendido',
        data: [
            <? $model = new  Existencias();
            foreach ($model->Listarz1as1('1',$_REQUEST['Inicio'],$_REQUEST['InicioFin']) as $r) 
                {
                  echo " ['".$r->NombreCompleto1."',".$r->TotalVenta1."],";
               }
            ?>
        ]
    }]
});
        </script>
</body>




   