<?php 
@session_start();
?>
<?php if(count($_SESSION['Detalle'])>0){?>
	<table class="table">
	    <thead>
	        <tr>
	        	<th>Id</th>
	            <th>Descripci&oacute;n</th>
	            <th>Cantidad</th>
				<th>Subtotal</th>
				<th>Total</th>
	            <th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    	$total = 0;
	    	$Canti = 0;
	    	foreach($_SESSION['Detalle'] as $k => $detalle){ 
			$total += $detalle['totall'];
	    	?>
	        <tr>
	        	<td><?php echo $detalle['id'];?></td>
	            <td><?php echo $detalle['producto'];?></td>
	            <td><?php echo $detalle['cant'];?></td>
				<td><?php echo $detalle['precioc'];?></td>
				<td><?php echo $detalle['totall'];?></td>
	            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
	        </tr>
	        <?php }?>
	        <tr>
	        	<td colspan="4" class="text-right"><font color="red"> Total</font></td>
	        	<td><?php echo $total;?></td>
	        	<td></td>
	        </tr>
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
				url: 'index.php?view=EliminarDetalle',
				type: 'post',
				data: {'id':id},
				dataType: 'json'
			}).done(function(data)
			{
				if(data.success == true)
				{
					alertify.success(data.msj);
					$(".detalle-producto").load('index.php?view=DetalleCompra');
				}
				else
				{
					alertify.error(data.msj);
				}
			})
	});
</script>