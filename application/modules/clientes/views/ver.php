<?php if($cliente->id==''):?>
<h1>Alta de Cliente</h1>
<?php else:?>
<h1>Cliente Nro: <?php echo $cliente->id;?></h1>
<?php endif;?>
<?php echo form_open($accion,'id="cliente-Form"', $ocultos);?>
<table>
  <tr>
    <th><?php echo form_label('Apellido', 'apellido')?></th>
    <td><?php echo form_input('apellido', $cliente->apellido, 'id="apellido"');?></td>
  </tr>
  <tr>
    <th><?php echo form_label('Nombre', 'nombre')?></th>
    <td><?php echo form_input('nombre', $cliente->nombre, 'id="nombre"');?></td>
  </tr>
  <tr>
    <th>Sexo</th>
    <td>
      <div id="selSexo">
        <?php echo form_label('Femenino', 'sexo1')?>
        <?php echo form_radio('sexo', 'F',($cliente->sexo=="F")?true:false,'id="sexo1"')?>
        <?php echo form_label('Masculino', 'sexo2')?>
        <?php echo form_radio('sexo', 'M',($cliente->sexo=="M")?true:false,'id="sexo2"')?>
      </div>
    </td>
  </tr>
  <tr>
    <th><?php echo form_label('Fecha Nacimiento', 'fecnac')?></th>
    <td><?php $fecha =new Datetime($cliente->fecnac);
              echo form_input('fecnac', $fecha->format('d/m/Y'), 'id="fecnac"');?></td>
  </tr>
  <tr>
    <th><?php echo form_label('Telefono', 'telefono')?></th>
    <td><?php echo form_input('telefono', $cliente->telefono, 'id="telefono"');?></td>
  </tr>
  <tr>
    <th><?php echo form_label('Direccion', 'direccion')?></th>
    <td><?php echo form_input('direccion', $cliente->direccion, 'id="direccion"');?></td>
  </tr>
  <tr>
    <th><?php echo form_label('E-Mail', 'email')?></th>
    <td><?php echo form_input('email', $cliente->direccion, 'id="email"');?></td>
  </tr>
  <tr>
    <td colspan="2">
      <?php echo anchor('clientes/','Cancelar','id="botCancel"')?>
      <?php if($accion=="clientes/borrarDo"):?>
        <div id="botBorrar">Borrar</div>
      <?php else:?>
        <div id="botAceptar">Grabar</div>
      <?php endif;?>
    </td>
  </tr>
</table>
<?php echo form_close();?>

<script>
$(document).ready(function(){
  $("#apellido").focus();
  $("#selSexo").buttonset();
  $("#fecnac").datepicker({	changeMonth: true, 
                            changeYear: true, 
                            dayNamesMin:['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                            monthNamesShort:['Ene', 'Feb', 'Mar', 'Abr','May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                            dateFormat:"dd/mm/yy"
                          });
  $("#botAceptar").button({icons:{primary:'ui-icon-disk'}});
  $("#botBorrar").button({icons:{primary:'ui-icon-trash'}});
  $("#botCancel").button({icons:{primary:'ui-icon-circle-close'}});
  $("#botAceptar").click(function(e){
    e.preventDefault();
    $("#cliente-Form").submit();
  });
  $("#botBorrar").click(function(e){
    e.preventDefault();
    $("#cliente-Form").submit();
  });
});
</script>