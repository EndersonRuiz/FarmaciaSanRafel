
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmacia1</title>

	<link rel="stylesheet" href="../../css/normalize.css">
	<link rel="stylesheet" href="../../css/sweetalert2.css">
	<link rel="stylesheet" href="../../css/material.min.css">
	<link rel="stylesheet" href="../../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../../css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../../js/material.min.js" ></script>
	<script src="../../js/sweetalert2.min.js" ></script>
	<script src="../../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../../js/main.js" ></script>

	
     <link rel="stylesheet" href="../../bostrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../bostrap/font-awesome/css/font-awesome.min.css">
        <script src="../../bostrap/js/jquery.min.js"></script>
        <script src="../../bostrap/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications"></i>
						<div class="mdl-tooltip" for="notifications">Notificaciones</div>
					</li>

					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir del Sistema</div>
					</li>
					
					<li class="text-condensedLight noLink" ><small>Nombre Usuario</small></li>
					<li class="noLink">
						<figure>
							<img src="../../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i>Farmacia San Rafael 
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="../../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						Nombre Completo Admin<br>
						<small>Puesto que Tiene</small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; Control</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="../Menu/menu.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								ADMINISTRACION
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							
							<li class="full-width">
								<a href="../Categorias/categoria.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										CATEGORIAS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="../Laboratorio/laboratorio.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										LABORATORIOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="index.php?view=Locations" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-label"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										UBICACIONES
									</div>
								</a>
							</li>
						</ul>
					</li>

					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="../Usuarios/Usuarios.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										REGISTROS DE USARIOS
									</div>
								</a>
							</li>

						</ul>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="../Productos/Productos.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								PRODUCTOS
							</div>
						</a>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="../Compras/Compras.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								COMPRAS
							</div>
						</a>
					</li>

					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								FARMACIAS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">

							<li class="full-width">
								<a href="../Farmacias/Farmacia1.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-desktop-mac"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FARMACIA#1
									</div>
								</a>
							</li>

							<li class="full-width">
								<a href="../Farmacias/Farmacia2.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-desktop-mac"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FARMACIA#2
									</div>
								</a>
							</li>

							<li class="full-width">
								<a href="../Farmacias/Farmacia3.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-desktop-mac"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FARMACIA#3
									</div>
								</a>
							</li>

						</ul>
					</li>
					


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="inventory.html" class="full-width">
							<div class="navLateral-body-cl">
								<i  ></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								REPORTES
							</div>
						</a>
					</li>


					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								MANUAL DE USUARIO
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										VER MANUAL
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PLUSS
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>

	</section>








     <!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Aqui Puede Realizar las Salidas de los Productos para venta....
					<br>
					<h2>Farmacia 1</h2> 
				</p>
			</div>
		</section>

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<!--clase donde se Registra al Usuario-->
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Salidas de Productos
							</div>

							

							<div class="full-width panel-content">

								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
											<i class="zmdi zmdi-search"></i>
										</label>

										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchAdmin" name="Buscar">
											<label class="mdl-textfield__label"></label>
										</div>

										<div class="mdl-textfield__expandable-holder">
											<select name="Elejido">
												<option>Codigo Barra</option>
												<option>Casa</option>
												<option>Nombre</option>
												<option>Marca</option>
											</select>
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>


								
								 <div class="full-width divider-menu-h"></div>
			<div class="row table-responsive">
				<table class="table table-bordered table-hover" class="table table-striped">
					<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
						<tr>
							<th>Cantidad</th>
							<th>Accion</th>
							<th>id</th>
							<th>Codigo Barra</th>
							<th>Nombre</th>
							<th>Marca</th>
							<th>Casa</th>
							<th>PrecioTope</th>
							<th>PrecioVenta</th>
							<th>Existencia</th>
							<th>Ubicacion</th>
							<th>Especifica</th>
							<th>Vencimiento</th>
							<th>Politica</th>
							<th>Cruz</th>
							<th>Batrez</th>
						</tr>
					</thead>
					<tbody>
						<tr class="active">

							<td> <input name="product_id" value="1" type="hidden">
                                            <input class="form-control" required="" name="q" placeholder="" type=""></td>
							<td> <button type="submit" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-shopping-cart"></i> Salida
                                            </button></td>
							<td>1</font></td>
							<td>123412233</td>
							<td>ainecox  2 forte tabletas unidad
</td>                       <td>chemilco
</td>
                            <td> </td>
							<td>3.16</td>
							<td>8.86</td>
							<td>10</td>
							<td>Esatanteria A-1</td>
							<td>Gabeta3</td>
                            <td>18/09/2022</td>
                            <td>18/12/2022</td>
							<td>6.61</td>
							<td>4.86</td>
						</tr>
						
					</tbody>
				</table>
			</div>
                            

                            <div class="full-width divider-menu-h"></div>
                            <h1 align="center">Lista Venta</h1>
			<div class="row table-responsive">
				<table class="table table-bordered table-hover" class="table table-striped">
					<thead class="bg-primary" style="background-color:  rgb(217, 83, 70);">
						<tr>
							<th>Codigo Barra</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<tr class="active">
							<td>123412233</td>
							<td>ainecox  2 forte tabletas unidad</td>
							<td>2</td>
                            <td><input type="submit" name="Cancelar" value="Cancelar"></td>
						</tr>
						
					</tbody>
				</table>

				 <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                <button class="btn btn-success">
                                                <i class="fa  fa-shopping-cart"></i> Finalizar Venta</button>
                                        </label>
                                        </div>
                                    </div>
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
</html>