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
			<div class="mdl-tabs__panel" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Listado de notificaciones sobre pedidos
							</div>
							<div class="full-width panel-content">
								

								<?

							        //CARGARLOS RESULTADOS A LA VARIABLE $r
							        $model = new Notifications ();

							        foreach($model->ListarBusqueda() as $r): 

															   
								 ?>

								<div class="mdl-list">


									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-shopping-cart mdl-list__item-avatar"></i>
											<span><? echo " ♥ ♥". $r->Nombre."    ✌♥ ♥✌  "."     Codigo:". $r->Codigo."     Fecha : ".$r->fecha." Hora ".$r->hora.""; ?></span>
											<span class="mdl-list__item-sub-title">
												<?
													  echo "ʕ•́ᴥ•̀ʔっ"."    (ง︡'-'︠)ง  ". $r->NombreCompleto;
												?>

											</span>
										</span>
										<a class="mdl-list__item-secondary-action"  href="index.php?view=EstadoPedido&Codigo=<?echo $r->Codigo;?>"><i class="fa fa-eye"></i></a>
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
	</section>

</body>
</html>