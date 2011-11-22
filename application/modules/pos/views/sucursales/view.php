<h2 class="title">
  <a href="#">Sucursal</a>
</h2>
<p class="meta">
  <span class="date"><?php echo $fecha?></span>
  <span class="posted">Usuario <a href="#"><?php echo $this->session->userdata('username')?></a></span>
</p>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<p>
  <?php echo form_open_multipart($accion, 'id="sucursal-form"', $ocultos)?>
  <?php echo form_label('Nombre:')?>
  <?php echo form_input('nombre', $sucursal->nombre, 'id="nombre" class="text-Form"')?>
  <br />
  <?php echo form_label('Direccion:')?>
  <?php echo form_input('direccion', $sucursal->direccion, 'id="direccion" class="text-Form"')?>
  <br />
  <?php echo form_close();?>
</p>
<p class="links">
  <?php echo anchor('pos/sucursales','Volver','id="Volver"');?>
  <?php echo anchor('#','Grabar','id="Grabar"');?>
</p>
</div>

<script>
$(document).ready(function(){
  $("#Grabar").click(function(e){
    e.preventDefault();
    $("#sucursal-form").submit();
  });
  $("#iGrabar").addClass('ui-icon');
  $("#iGrabar").addClass('ui-icon-disk');
  $("#nombre").focus();
});
</script>