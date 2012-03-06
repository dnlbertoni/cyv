<h1>Imprimo Comprobante</h1>
<div id="final"></div>
<script>
$(document).ready(function(){
    var puesto   = <?php echo $puesto;?>;
    var sucursal = <?php echo $sucursal;?>;
    var pagina = <?php echo $pagina;?>;
    $.ajax({
            url: pagina,
            contentType: "application/x-www-form-urlencoded",
            global: false,
            type: "POST",
            data: ({
                    puesto : puesto,
                    sucursal : sucursal
                  }),
            dataType: "html",
            async:false,
            beforeSend: function(){$("#loading").fadeIn();},
            success: function(msg){
               $("#final").html(msg);
            }
    }).responseText;
})
</script>