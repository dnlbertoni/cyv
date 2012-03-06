<h2 class="title">
  <a href="#">Articulo</a>
</h2>
<p class="meta">
  <span class="date"><?php echo $fecha?></span>
  <span class="posted">Usuario <a href="#"><?php echo $this->session->userdata('username')?></a></span>
</p>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<p>
<?php echo form_open_multipart($accion, 'id="articulo-form"', $ocultos)?>
<table>
  <tr>
    <th><?php echo form_label('Nombre:')?></th>
    <td><?php echo form_input('nombre', $articulo->nombre, 'id="nombre" class="text-Form"')?></td>
  </tr>  
  <tr>
    <th>
      Comercializacion
    </th>
    <td>
      <div id="rbPeso">
        <?php echo form_label('Venta al Peso', 'peso1')?>  
        <?php echo form_label('Venta x Unid', 'peso2')?>  
        <?php echo form_radio('peso', 1, ($articulo->peso==1)?true:false, 'id=peso1')?>
        <?php echo form_radio('peso', 0, ($articulo->peso==0)?true:false, 'id=peso2')?> 
      </div>      
    </td>
  </tr>
  <tr>
    <th><?php echo form_label('Kg x Bulto:')?></th>
    <td><?php echo form_input('kg', $articulo->kg, 'id="kg" class="num-Form"')?></td>
  </tr>
  <tr>
    <th>
     <?php echo form_label('Precio x Kilo:')?> 
    </th>
    <td>
      <?php echo form_input('precio', $articulo->precio, 'id="precio" class="num-Form"')?>      
    </td>
  </tr>
  <tr>
    <th>
      <?php echo form_label('Precio al Publico')?>
    </th>
    <td><?php echo form_input('publico', $articulo->publico, 'id="publico" class="num-Form"')?></td>
  </tr>
  <tr>
    <th>Markup:</th>
    <td id="mkp"></td>
  </tr>
</table>
  <?php echo form_close();?>
</p>
<p class="links">
  <?php echo anchor('articulos/','Volver','id="Volver"');?>
  <?php echo anchor('','Grabar','id="Grabar"');?>
</p>
</div>

<script>
$(document).ready(function(){
  $("#rbPeso").buttonset();
  $("#Grabar").click(function(e){
    e.preventDefault();
    $("#articulo-form").submit();
  });
  $("#iGrabar").addClass('ui-icon');
  $("#iGrabar").addClass('ui-icon-disk');
  if(parseFloat($("#precio").val()).toFixed(3)>0)
    markupView();
  $("#precio").change(function(){
    markupView();
  });
  $("#publico").change(function(){
    markupView();
  });
});

function markupView(){
  var mkp= ( ( parseFloat($("#publico").val()).toFixed(3) / parseFloat($("#precio").val()).toFixed(3) ) - 1 ) * 100;
  $("#mkp").html(mkp.toFixed(3)+"%");
}
</script>