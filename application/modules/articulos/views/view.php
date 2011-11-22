<h2 class="title">
  <a href="#">Alta de Articulo</a>
</h2>
<p class="meta">
  <span class="date"><?php echo $fecha?></span>
  <span class="posted">Usuario <a href="#"><?php echo $this->session->userdata('username')?></a></span>
</p>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<p>
  <?php echo form_open_multipart($accion, 'id="articulo-form"', $ocultos)?>
  <?php echo form_label('Nombre:')?>
  <?php echo form_input('nombre', $articulo->nombre, 'id="nombre" class="text-Form"')?>
  <br />
  <?php echo form_label('Kg x Bulto:')?>
  <?php echo form_input('kg', $articulo->kg, 'id="kg" class="num-Form"')?>
  <br />
  <?php echo form_label('Costo x Kilo:')?>
  <?php echo form_input('costo', $articulo->costo, 'id="costo" class="num-Form"')?>
  <br />
  <?php echo form_label('Precio x Kilo:')?>
  <?php echo form_input('precio', $articulo->precio, 'id="precio" class="num-Form"')?>
  <?php echo form_close();?>
</p>
<p class="links">
  <?php echo anchor('articulos/','Volver','id="Volver"');?>
  <?php echo anchor('','Grabar','id="Grabar"');?>
</p>
</div>

<script>
$(document).ready(function(){
  $("#Grabar").click(function(e){
    e.preventDefault();
    $("#articulo-form").submit();
  });
  $("#iGrabar").addClass('ui-icon');
  $("#iGrabar").addClass('ui-icon-disk');
});
</script>