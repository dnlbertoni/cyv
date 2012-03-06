<h2>Pedido sucursal -- <?php echo $sucursal?></h2>
<div class="post">
  <p class="meta">
    <span class="date"><?php echo form_input('fecha',$fecha,'id="fecha"')?></span><span class="posted"><?php echo $comprobante?></span>
  </p>
</div>
  <div style="clear: both;">&nbsp;</div>
<?php echo form_open('', 'id="addCart"', $ocultos)?>
  Cantidad:<?php echo form_input('cantidad','','id="cantidad"')?>
  Articulo:<?php echo form_input('articulo','','id="articulo"')?>
  <input type="hidden" name="sucursal" id="sucursal" value="<?php echo $sucId?>" />
  <input type="hidden" name="puesto"   id="puesto" value="<?php echo $puesto?>" />
  <input type="hidden" name="numero"   id="numero" value="<?php echo $numero?>" />
  <input type="hidden" name="pagina"   id="pagina" value="<?php echo $pagina?>" />
  <div id="Agregar">Agregar</div>
<?php echo form_close();?>
<div style="clear: both;">&nbsp;</div>
<div id="imprimo"></div>
<div id="carga" ><img src="<?php echo base_url()."themes/cacao/images/loading.gif"?>" /></div>
<div class="post">
  <div id="articuloAjax"></div>
  <div id="movimientos"></div>
</div>

<script>
$(document).ready(function(){
  muestroDetalles();
  $("#carga").css('text-align', 'center');
  $("#carga").hide();
  $("#cuentaAjax").hide();
  $("#Agregar").button({icons:{primary:'ui-icon-circle-plus'}});
  var Cantidad = $("#addCart #cantidad");
  var Articulo = $("#addCart #articulo");
  var Agrego   = $("#addCart");
  Cantidad.focus();
  Cantidad.css('width','60px');
  Cantidad.addClass('focus');
  Articulo.css('width','80px')
  $("#Agregar").click(function(){
    Agrego.submit();
  });
  /*
   * Verifico los focos
   */
  Cantidad.blur(function(){
    Cantidad.removeClass('focus');
  });
  Cantidad.focus(function(){
    Cantidad.addClass('focus');
  });
  Articulo.blur(function(){
    Articulo.removeClass('focus');
  });
  Articulo.focus(function(){
    Articulo.addClass('focus');
  });

  //chequeo las teclas de funciones
  $(document).bind('keydown',function(e){
    var code = e.keyCode;
    key = getSpecialKey(code)
    if(key){
      e.preventDefault();
      switch(key){
        case 'f1':
          CanceloComprobante();
          break;
        case 'f3':
          Cantidad.addClass('focus');
          Cantidad.focus();
          break;
        case 'f6':
          Cantidad.removeClass('focus');
          CambioSucursal();
          break;
        case 'f12':
          ImprimoTicket();
          break;
      }
    }else{
      if(code==13){
        var bandera = true;
        cantidadTXT = Cantidad.val().trim();
        articuloTXT = Articulo.val().trim();
        if(cantidadTXT ==''){
          if(Cantidad.hasClass('focus')==true && bandera){
            alert('Se debe Ingresar una cantidad');
            bandera = false;
          }
        }else{
          if(Cantidad.hasClass('focus')==true && bandera ){
            Cantidad.blur();
            Articulo.focus();
            bandera = false;
          };                  
        }        
        if(articuloTXT ==''){
          if(Articulo.hasClass('focus')==true && bandera ){
            ConsultoArticulo();
            bandera = false;
          };
        }else{
          if(Articulo.hasClass('focus')==true && bandera ){
            bandera = false;
            Agrego.submit();
          };
        }
      }
    };
  });
  // fin de chequeo de teclas de funciones
  //inicio de envio de datos al comprobante
  Agrego.submit(function(e){AgregoArticulo(e);} );
  //fin de envio de datos al comprobante
});  

function AgregoArticulo(e){
    e.preventDefault();
    articulo     = $("#articulo").val();
    cantidad     = $("#cantidad").val();
    puesto       = $("#puesto").val();
    numero       = $("#numero").val();
    sucursal     = $("#sucursal").val();
    pagina       = $("#pagina").val();
    $.ajax({
            url: pagina,
            contentType: "application/x-www-form-urlencoded",
            global: false,
            type: "POST",
            data: ({articulo : articulo,
                    cantidad : cantidad,
                    puesto   : puesto,
                    sucursal : sucursal,
                    numero   : numero
                  }),
            dataType: "html",
            async:false,
            beforeSend: function(){$("#carga").fadeIn();},
            success: function(msg){
               $("#movimientos").html(msg);
               $("#cantidad").val('');
               $("#articulo").val('');
               $("#cantidad").focus();
               $("#loading").fadeOut(100);
               $("#carga").hide();
            }
    }).responseText;
  }
function getSpecialKey(code){
  if(code > 111 && code < 124){
    aux = code - 111;
    return 'f'+aux;
  }else{
    return false;
  }
}
function ConsultoArticulo(){
  var urlConsulta = <?php echo "'".base_url()."index.php/articulos/consultaPos'"?>;
  var dialogOpts  = {
        modal: true,
        bgiframe: true,
        autoOpen: false,
        height: 300,
        width: 500,
        title: "Consulta de Articulos",
        draggable: true,
        resizeable: true,
        close: function(){
          $('#articuloAjax').dialog("destroy");
          $("#articulo").addClass('focus');
          $("#articulo").focus();
        }
     };
  $("#articuloAjax").dialog(dialogOpts);   //end dialog
  $("#articuloAjax").load(urlConsulta, [], function(){
                 $("#articuloAjax").dialog("open");
              }
           );
}
function CanceloComprobante(){
    $("#cuenta").val(1);
    puesto       = $("#puesto").val();
    sucursal     = $("#sucursal").val();
    numero       = $("#numero").val();
    pagina       = <?php echo $paginaDel?>;
    $.ajax({
            url: pagina,
            contentType: "application/x-www-form-urlencoded",
            global: false,
            type: "POST",
            data: ({
                    puesto : puesto,
                    numero : numero,
                    sucursal : sucursal
                  }),
            dataType: "html",
            async:true,
            beforeSend: function(){$("#loading").fadeIn();},
            success: function(msg){
               $("#movimientos").html(msg);
               $("#codigobarra").val('');
               $("#codigobarra").focus();
               $("#loading").fadeOut(200);
            }
    }).responseText;
}
function CambioCliente(){
  var dialogOpts = {
        modal: true,
        bgiframe: true,
        autoOpen: false,
        hide: "explode",
        open: function(){$("#cuentaTXT").focus();},
        height: 300,
        width: 500,
        title: "Consulta de Clientes",
        draggable: true,
        resizeable: true,
        close: function(){
          valor  = $("#cuentaAjax > .codigo").html();
          nombre = $("#cuentaAjax > .nombre").html();
          ctacte = $("#cuentaAjax > .ctacte").html();
          ctacteId = (ctacte=="CtaCte")?1:0;
          tipcom = $("#cuentaAjax > .tipcom").html();
          $("#idCuenta").html(valor);
          $("#cuentaAjax").html(valor);
          $("#cuenta").val(valor);
          $("#nombreCuenta").html(nombre);
          $("#condVta").html(ctacte);
          $("#condVtaId").val(ctacteId);
          $("#tipcom_id").val(tipcom);
          $("#tipcom_nom").html("Factura");
          claseCondVta = (ctacte=="CtaCte")?"ui-state-error":"ui-state-default";
          $("#condVta").removeAttr('class');
          $("#condVta").addClass(claseCondVta);

          $("#cliente").dialog('destroy');
          $("#codigobarra").addClass('focus');
          $("#codigobarra").focus();
        }
     };
  $("#cliente").dialog(dialogOpts);   //end dialog
  $("#cliente").load($("#paginaCliente").val(), [], function(){
                 $("#cliente").dialog("moveToTop");
                 $("#cliente").dialog("open");
              }
           );
}
function ImprimoTicket(){
  var url = <?php echo "'".base_url()."index.php/pos/imprimoComprobante/$puesto/$numero/$sucId"."'";?>;
  /*
  var dialogOpts = {
        modal: true,
        bgiframe: true,
        autoOpen: false,
        hide: "explode",
        open: function(){$("#carga").fadeIn();},
        //height: 200,
        //width: 300,
        title: "Imprimo Comprobante",
        draggable: true,
        resizeable: true,
        close: function(){
          window.location = <?php echo "'".base_url()."index.php/pos/"."'";?>;}
  };
  $("#imprimo").dialog(dialogOpts);   //end dialog
  $("#imprimo").load(url, [], function(){
                 $("#imprimo").dialog("moveToTop");
                 $("#imprimo").dialog("open");
              });
 */
 window.open(url,"_blank");
 window.location = <?php echo "'".base_url()."index.php/pos/"."'";?>;
}
function muestroDetalles(){
    puesto       = $("#puesto").val();
    sucursal     = $("#sucursal").val();
	numero       = $("#numero").val();
    pagina       = <?php echo $paginaDet?>;
    $.ajax({
            url: pagina,
            contentType: "application/x-www-form-urlencoded",
            global: false,
            type: "POST",
            data: ({
                    puesto   : puesto,
					numero   : numero, 
                    sucursal : sucursal
                  }),
            dataType: "html",
            async:false,
            beforeSend: function(){$("#loading").fadeIn();},
            success: function(msg){
               $("#movimientos").html(msg);
               $("#cantidad").val('');
               $("#articulo").val('');
               $("#cantidad").focus();
               $("#loading").fadeOut(100);
            }
    }).responseText;
  }

</script>
