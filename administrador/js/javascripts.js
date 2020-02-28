function limpiarBoton() {
  $(".btn_limpiar_boton").click(function(e) {
    $(this)[0].blur();
  });
}

function initAprobar() {
  $(".btn_aprobar_caso").click(function(e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var boton = $(this)[0];
    boton.blur();

    var agree = alertify.confirm('¿Esta Seguro Que Desea Aprobar el Plan?', 
      function(){ 
        $.ajax({
          type: "POST",
          url: "aprobar_planes.php",
          data: 'id='+id,
          success: function(data){
            alertify.success(data, 1, cargarInfo);
          }
        });
      }, 
      function(){ 
        alertify.error('Cancelado')
      }
    );
  });
}

function initElaborado() {
  $(".btn_elaborar_caso").click(function(e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var boton = $(this)[0];
    boton.blur();

    var agree = alertify.confirm('¿Esta Seguro Que Desea Cancelar Este Caso?', 
      function(){ 
        $.ajax({
          type: "POST",
          url: "reversar_aprobacion.php",
          data: 'id='+id,
          success: function(data){
            alertify.success(data, 1, cargarInfo);
          }
        });
      }, 
      function(){ 
        alertify.error('Cancelado')
      }
    );
  });
}