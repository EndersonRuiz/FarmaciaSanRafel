<?php 
@session_start();
?>
<?php if(count($_SESSION['DetalleSanJuan'])>0){?>
	<table class="table">
	    <thead>
	        <tr>
	        	<th>Id</th>
	            <th>Descripci&oacute;n</th>
	            <th>Cantidad</th>
	            <th>Precio</th>
	            <th>Subtotal</th>
				<th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    	$desc = 0;
	    	$total = 0;
	    	$Canti = 0;
	    	foreach($_SESSION['DetalleSanJuan'] as $k => $detalle){ 
			$total += $detalle['subtotal'];
	    	?>
	        <tr>
	        	<td><?php echo $detalle['id'];?></td>
	            <td><?php echo $detalle['producto']."(".$detalle['sucursal'].")";?></td>
	            <td><?php echo $detalle['cantidad'];?></td>
	            <td><?php echo $detalle['precio'];?></td>
				<td><?php echo $detalle['subtotal'];?></td>

	            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>" style="background-color: #1E90FF ">Eliminar</button></td>
	        </tr>
	        <?php }?>
	        <tr>
	        	<td colspan="4" class="text-right"><font color="red"> Total</font></td>
	        	<td><?php echo $total;?></td>
	        	<td></td>
	        </tr>
	        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input value="<? echo $total; ?>" class="mdl-textfield__input" type="text"  id="datos1" readonly >
												
			</div>

	    </tbody>
	</table>
<?php }else{?>
<div class="panel-body"> No hay productos agregados</div>
<?php }?>

<script type="text/javascript">
	$(".eliminar-producto").off("click");
		$(".eliminar-producto").on("click", function(e) 
		{
			var id = $(this).attr("id");
			$.ajax({
				url: 'index.php?view=EliminarDetalleVentaSanJuan',
				type: 'post',
				data: {'id':id},
				dataType: 'json'
			}).done(function(data)
			{
				if(data.success == true)
				{
					alertify.success(data.msj);
					$(".detalle-producto").load('index.php?view=DetalleVentaSanJuan');
				}
				else
				{
					alertify.error(data.msj);
				}
			})
	});
</script>