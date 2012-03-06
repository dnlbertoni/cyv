<div class="post">
	<h2 class="title"><a href="#">Armo Pedido</a></h2>
	<div class="entry">
	  <?php foreach($sucursales as $sucursal):?>
	    <?php echo anchor('pos/pedido/'.$sucursal->id,$sucursal->nombre,'id="botPedido" class="boton"')?>
	  <?php endforeach;?>
	</div>
</div>
<div class="post">
	<h2 class="title"><a href="#">Facturas Pendientes</a></h2>
	<div class="entry">
	  <?php foreach($sucursales as $sucursal):?>
	    <?php echo anchor('pos/ctacte/pendientes/'.$sucursal->id,$sucursal->nombre,'id="botPendientes" class="boton"')?>
	  <?php endforeach;?>
	</div>
</div>
<script>
$(document).ready(function(){
  $('.boton').button();
});
</script>